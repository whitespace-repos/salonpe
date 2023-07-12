<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Product;
use Setting;
use Category;
use Illuminate\Support\Arr;
use Brand;

class Websites extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function landing(Request $request)
    {            
        //
        $brands = Brand::select("id","name")->whereHas("products")->get();        
        //    
        $products = [];
        if($request->has("selectedBrand"))
            $products = Product::with(["category","subCategory"])->where("brand_id",$request->get("selectedBrand"))->orderBy("category_id")->get();
                    //   
       return Inertia::render("Websites/Landing",   [
                                                        "brands" => $brands,
                                                        "products" => $products,
                                                        "categories" => Category::whereNull("parent_id")->get(),                                                      
                                                        "FeaturedProducts" => Setting::where("name","FeaturedProducts")->where("group","Website")->first(),
                                                        "BestSelling" => Setting::where("name","BestSelling")->where("group","Website")->first(),
                                                        "BestOffer" => Setting::where("name","BestOffer")->where("group","Website")->first(),
                                                        "topCategories" => Setting::where("name","TopCategories")->where("group","Website")->first(),
                                                        "shopByBrands" => Setting::where("name","ShopByBrands")->where("group","Website")->first(),
                                                        "brandsList" => Brand::select(['id','name','image'])->whereNotNull("image")->get(),
                                                        "browseCategories" => Setting::where("name","BrowseCategories")->where("group","Website")->first(),
                                                    ]);
    }




    public function storeFeaturedOfferSellingProduct(Request $request){
        $setting = Setting::where("name" , $request->type)->where("group","Website")->first();
        if($request["type"] == "TopCategories" || $request["type"] == "ShopByBrands"){
            $setting->data =  $request["idsToArray"];
        }else{
            $setting->data = array_values(array_unique(array_merge($setting->data->toArray(),$request["idsToArray"])));
        }
        // 
        $setting->save();
        return back();
    }

    public function removeFeaturedOfferSellingProduct($id,$name){
        $setting = Setting::where("name" , $name)->where("group","Website")->first();        
        $setting->data = array_values(array_diff($setting->data->toArray(),[$id]));
        $setting->save();
        return back();
    }

}
