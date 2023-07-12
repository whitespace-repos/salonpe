<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Setting;
use Product;
use Brand;
use Banner;

class SalonpeWeb extends Controller
{
    //

    public function landing(){
        $featuredProducts = Setting::where("name" , "FeaturedProducts")->where("group","Website")->first();
        $bestSelling = Setting::where("name" , "BestSelling")->where("group","Website")->first();
        $bestOffer = Setting::where("name" , "BestOffer")->where("group","Website")->first();
        $shopByBrands = Setting::where("name","ShopByBrands")->where("group","Website")->first();
        $browseCategories = Setting::where("name","BrowseCategories")->where("group","Website")->first();
        $banners = Banner::where("active",true)->get();
        // 
        $topCategories = Setting::where("name" , "TopCategories")->where("group","Website")->first();
        foreach ($topCategories->categories as $key => $category) {
            $category->products = Product::with("attributes.media",'category')->where("category_id",$category->id)->orderByRaw("RAND()")->limit(10)->get();
        }        
        return Inertia::render("Web/Salonpe" , [ 
            'FeaturedProducts' => $featuredProducts,
            'TopCategories' => $topCategories ,
            "BestSelling" => $bestSelling,
            "BestOffer" => $bestOffer,
            "banners" => $banners,
            "shopByBrands" => $shopByBrands,
            "browseCategories" => $browseCategories
        ]);  
    }


    public function aboutUs(){        
        $aboutus = Setting::where("name" , "AboutUs")->first();
        return Inertia::render("Web/AboutUs",[
                                                "aboutUs" => $aboutus,
                                                "featuredProducts" => Setting::where("name" , "FeaturedProducts")->where("group","Website")->first()
                                            ]);
    }

    public function contactUs(){        
        $contactus = Setting::where("name" , "Contact")->first();
        return Inertia::render("Web/ContactUs",[
                                                "contactUs" => $contactus
                                            ]);
    }


    public function store(){       
        return Inertia::render("Web/OurStore");
    }


    public function productDetail($id){
        $products = Product::with("attributes.media")->find($id);
        return Inertia::render("Web/ProductDetail", [ "product" => $products ]);
    }

}
