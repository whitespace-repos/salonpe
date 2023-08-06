<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Setting;
use Brand;
use Category;

class Settings extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        
        return Inertia::render('Settings/Index',[
                                                    "location" => Setting::where('name','Location')->first(),
                                                    "contact" => Setting::where('name','Contact')->first(),
                                                    "website" => Setting::where('name','Website')->first(),
                                                    "aboutus" => Setting::where('name','AboutUs')->first()
        ]);
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
        //
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
    }

    public function settingEdit(string $type){        
        if($type == 'location'){            
            return Inertia::render('Settings/Location' , [ "location" => Setting::where('name','Location')->first()]);
        }elseif($type == 'contact'){
            return Inertia::render('Settings/Contact' , [ "contact" => Setting::where('name','Contact')->first()]);
        }elseif($type == 'website'){
            $brands = Brand::select("id","name")->whereHas("products")->get(); 
            $categories = Category::with(['subCategories' => function($query){
                                            $query->withCount('products');
                                            $query->whereHas("products");
                            }])
                            ->whereHas("subCategories")
                            ->where('parent_id',null)->get();
            return Inertia::render('Settings/Website' , [ 
                                        "website" => Setting::where('name','Website')->first(),
                                        "brands" => $brands,
                                        "categories" => $categories
                                    ]);
        }elseif($type == 'aboutus'){
            return Inertia::render('Settings/AboutUs' , [ "aboutus" => Setting::where('name','AboutUs')->first()]);
        }

    }


    public function settingStore(Request $request ,string $type){        
        $module = null;
        // 
        if($type == 'location'){
            $module = 'Location';
        }elseif($type == 'contact'){
            $module = 'Contact'; 
        }elseif($type == 'website'){
            $module = 'Website'; 
        }elseif($type == 'aboutus'){
            $module = 'AboutUs'; 
        }
        // 
        if($module != null)
            Setting::where('name',$module)->update([ "data" => $request->all() ]);
        // 
        return redirect()->route('setting.index');
    }





}
