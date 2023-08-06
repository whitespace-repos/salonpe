<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Setting;
use Product;
use Brand;
use Banner;
use Category;
use Illuminate\Database\Eloquent\Builder;

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
        $shopByBrands = Setting::where("name","ShopByBrands")->where("group","Website")->first();
        return Inertia::render("Web/AboutUs",[
                                                "aboutUs" => $aboutus,
                                                "shopByBrands" => $shopByBrands,
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
        $shopByBrands = Setting::where("name","ShopByBrands")->where("group","Website")->first();
        $browseCategories = Setting::where("name","BrowseCategories")->where("group","Website")->first();
        return Inertia::render("Web/OurStore", [ 'shopByBrands' => $shopByBrands , "browseCategories" => $browseCategories ]);
    }


    public function productDetail($id){
        $product = Product::with("attributes.media")->find($id);
        return Inertia::render("Web/ProductDetail", [ "product" => $product ]);
    }

    public function productFilter(Request $request){                        
        //
        return Inertia::render('Web/ProductFilter', [
            'products' => Product::with('category',"attributes.media" , 'brand')
                            ->where(function($query) use($request){ 
                                //
                                if($request->has('categories'))       
                                    $query->whereIn('sub_category_id',$request->categories);

                                if($request->has('brands'))       
                                    $query->whereIn('brand_id',$request->brands);
                            })
                            ->paginate(20)
                            ->onEachSide(0)
                            ->withQueryString()
                            ->through(fn ($product) => [
                                'id' => $product->id,
                                'name' => $product->name,
                                'thumb_image' => $product->thumb_image,
                                'created_at' => $product->created_at,
                                'category' => empty($product->category) ? null : $product->category,
                                'attributes' => empty($product->subCategory) ? null : $product->attributes,
                                'brand' => $product->brand
                            ]),
            "categoriesWithSub" => Category::with(['subCategories' => function($query){
                                                                        $query->withCount('products');
                                                                        $query->whereHas("products");
                                                 }])
                                                 ->whereHas("subCategories")
                                                 ->where('parent_id',null)->get() ,
            "filteredCategories" => $request->has("categories") ? $request->categories  : [],
            "filteredBrands" => $request->has("brands") ? $request->brands : [],
            "brands" => Brand::select("id","name")->whereHas("products")->get()
        ]);  
    }

}
