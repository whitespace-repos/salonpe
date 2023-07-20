<?php

namespace App\Http\Controllers;

use Exception;
use Razorpay\Api\Api;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Payment;
use TrackOrder;
use Inertia\Inertia;
use \Carbon\Carbon;

class RazorpayController extends Controller
{
    public function handlePayment(Request $request)
    {
        $cart = auth()->user()->activeCart;

        $payment = Payment::create([
            'cart_id' => $cart->id,
            'user_id' => $cart->user_id,
            "quantity" => $cart->items->count(),
            "mrp" => $cart->items->sum('mrp'),
            "applied_price"  => $cart->items->sum('applied_price'),
            "payble_price" => $cart->payble_price,
            "grand_total" => $cart->grand_total,
            "discount" => $cart->discount,
            "payment" => true ,
            "payment_id" => $request->payment_id,
        ]);

        $order = $cart->order;
        $order->payment_id  = $payment->id;
        $order->payment = $payment->payment;
        $order->save(); 

        $order->track = new TrackOrder();
        $order->track->order_id = $order->id;
        $order->track->user_id  = $order->user_id;
        $order->track->confirmed = true;
        $order->track->confirmed_at = Carbon::now();
        $order->track->save();
        
        $cart->status = false;
        $cart->save();
        // 
        return redirect()->route('cart.payment.success');
    }


    public function success(){
        return Inertia::render("Web/PaymentSuccess");
    }
}
