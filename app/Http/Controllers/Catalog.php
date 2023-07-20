<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Wishlist;
use Illuminate\Support\Facades\Auth;
use Product;
use ProductAttribute; 

class Catalog extends Controller
{
    //

    public function addToWishlist(Request $request){
        // 
        $product = Product::with("category")->find($request->product);
        $attribute = ProductAttribute::find($request->attribute);
        $data = [
                            "user_id" => auth()->user()->id,
                            "product_id" => $request->product,
                            "attribute_id" => $request->attribute,
                            "product" => $product,
                            "attribute" => $attribute
        ];
        $existance = Wishlist::where($data)->exists();
        if(!$existance)
            Wishlist::create($data);
        else
            Wishlist::where($data)->delete();
        // 
        return response()->json($existance);
    }

    public function toggleWishlist(Request $request){
        $product = Product::with("category")->find($request->product);
        $attribute = ProductAttribute::find($request->attribute);
        $data = [
                            "user_id" => auth()->user()->id,
                            "product_id" => $request->product,
                            "attribute_id" => $request->attribute,
                            "product" => $product,
                            "attribute" => $attribute
        ];
        $existance = Wishlist::where(["user_id" => auth()->user()->id , "product_id" => $request->product ,"attribute_id" => $request->attribute ])->exists();
        if(!$existance)
            Wishlist::create($data);
        else
            Wishlist::where(["user_id" => auth()->user()->id , "product_id" => $request->product ,"attribute_id" => $request->attribute ])->delete();

        return back();
    }

    public function wishlists(){
        if(Auth::check()){
            return Inertia::render("Web/Wishlists",[ "wishlists" => auth()->user()->wishlists ]);
        }else{
            return Inertia::render('Web/MyAccount/Login' , [ "referral" => route('wishlists') ]);
        }     
    }
}
