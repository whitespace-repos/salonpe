<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Cart;
use CartItem;
use ProductAttribute;
use Inertia\Inertia;
use Product ;
use Illuminate\Support\Facades\Auth;
use Order;
use Address;
use Wishlist;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        if(Auth::check()){
            $cart = auth()->user()->activeCart;
            if(!empty($cart))
                $cart->load('items');
            return Inertia::render("Web/Cart",["cart" => $cart ]);
        }else{
            return Inertia::render('Web/MyAccount/Login' , [ "referral" => route('cart.index') ]);
        }     
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
        $product = Product::find($request->product);
        $attribute = ProductAttribute::find($request->attribute);
        $price = ($attribute->discounted_mrp == 0) ? $attribute->mrp : $attribute->discounted_mrp;
        $payble = $price * $request->quantity;
        $cart = auth()->user()->activeCart;
        //
        if(empty($cart)){
            $cart = Cart::create([
                                "user_id" => auth()->user()->id,
                                "quantity" => 1
            ]); 
        }

        $cart->items()->create([
                "user_id" => auth()->user()->id,
                "product_id" => $request->product,
                "product_attribute_id" => $request->attribute,
                "quantity" => $request->quantity,
                "mrp" => $attribute->mrp,
                "applied_price" => $price,
                "payble_price" =>$payble,
                "grand_total" => $payble,
                "discount" => $attribute->discounted_mrp,
                "product" =>  $product,
                "attribute" => $attribute
        ]);

        $cart->payble_price = $cart->items->sum('payble_price');
        $cart->grand_total = $cart->items->sum('grand_total');
        $cart->discount = $cart->items->sum('discount');
        $cart->quantity = $cart->items->count();
        $cart->save();

        if($request->has("wishlist_id")){
            $wishlist = Wishlist::find($request->wishlist_id);
            $wishlist->moved_to_cart = true;
            $wishlist->save();
            $wishlist->delete();
            return back();
        }
            

        // axios response
        return response(true, 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $cart = auth()->user()->activeCart;
    
        $cart->items()->where('id',$id)->delete();
        $cart->payble_price = empty($cart->items) ? 0 : $cart->items->sum('payble_price');
        $cart->grand_total = empty($cart->items) ? 0 :  $cart->items->sum('grand_total');
        $cart->discount = empty($cart->items) ? 0 : $cart->items->sum('discount');
        $cart->quantity = empty($cart->items) ? 0 :  $cart->items->count();
        $cart->save();

        $cart->order()->update([
            "quantity" => $cart->items->count(),
            "mrp" => $cart->items->sum('mrp'),
            "applied_price" => $cart->items->sum('applied_price'),
            "payble_price"=> $cart->payble_price,
            "grand_total"=> $cart->grand_total,
            "discount"=> $cart->discount,
        ]);
        // 
        return Redirect::back()->with('success', 'Cart removed.');
    }

    public function clear(){
        $cart = auth()->user()->activeCart;
        $cart->items()->delete();
        $cart->payble_price = 0;
        $cart->grand_total = 0;
        $cart->discount = 0;
        $cart->quantity = 0;
        $cart->save();

        $cart->order()->update([
            "quantity" => $cart->items->count(),
            "mrp" => $cart->items->sum('mrp'),
            "applied_price" => $cart->items->sum('applied_price'),
            "payble_price"=> $cart->payble_price,
            "grand_total"=> $cart->grand_total,
            "discount"=> $cart->discount,
        ]);
        //
        return Redirect::back()->with('success', 'Cart Clear.');
    }

    public function detail(){
        $cart   = auth()->user()->activeCart;
        $cart->load('items');
        //
        if($cart->order == null){
            Order::create([
                            'cart_id' => $cart->id,
                            'user_id' => $cart->user_id,
                            "quantity" => $cart->items->count(),
                            "mrp" => $cart->items->sum('mrp'),
                            "applied_price" => $cart->items->sum('applied_price'),
                            "payble_price"=> $cart->payble_price,
                            "grand_total"=> $cart->grand_total,
                            "discount"=> $cart->discount,
            ]);
        }else{
            $cart->order()->update([
                "quantity" => $cart->items->count(),
                "mrp" => $cart->items->sum('mrp'),
                "applied_price" => $cart->items->sum('applied_price'),
                "payble_price"=> $cart->payble_price,
                "grand_total"=> $cart->grand_total,
                "discount"=> $cart->discount,
            ]);
        };

        // 
        $addresses = auth()->user()->addresses;
        return Inertia::render("Web/CheckoutDetail",[ "cart" => $cart , "addresses" => $addresses ]);
    }

    public function saveAddress(Request $request){
        Address::create($request->all());
        return Redirect::back()->with('success', 'Address Saved !');
    }

    public function shippingDetail(Request $request){
        $cart   = auth()->user()->activeCart;
        if($request->has('address')){
            $cart->address_id = $request->address;
            $cart->order->address_id = $request->address;
            $cart->order->save();
            $cart->save();
            return redirect()->route('cart.shipping.detail');
        }
               
        //
        $cart->load('items');
        return Inertia::render("Web/ShippingDetail",[ "cart" => $cart ]);
    }

    public function makePayment(){
        $cart   = auth()->user()->activeCart;
        $cart->load('items');
        return Inertia::render("Web/Payment",[ "cart" => $cart ]);
    }


    


}
