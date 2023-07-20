<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Wishlist;

class Catalog extends Controller
{
    //

    public function addToWishlist(Request $request){
        // 
        $data = [
                            "user_id" => auth()->user()->id,
                            "product_id" => $request->product,
                            "attribute_id" => $request->attribute
        ];
        $existance = Wishlist::where($data)->exists();
        if(!$existance)
            Wishlist::create($data);
        else
            Wishlist::where($data)->delete();
        // 
        return response()->json($existance);


    }
}
