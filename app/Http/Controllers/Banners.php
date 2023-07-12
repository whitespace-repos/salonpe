<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Banner;

class Banners extends Controller
{
      /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        return Inertia::render('Banners/Index', [
            'filters' => ['search', 'trashed'],
            'banners' => Banner::orderBy('id')
                            ->where(function($query) use($request){
                                if($request->has("search")){
                                    $searchBy = ($request->has("by")) ? $request->by : "title";
                                    $query->where($searchBy,'LIKE','%'.$request->search."%");
                                }                  
                            })
                            ->paginate(10)
                            ->onEachSide(0)
                            ->withQueryString()
                            ->through(fn ($banner) => [
                                'id' => $banner->id,
                                'title' => $banner->title,
                                'heading' => $banner->heading,
                                "image" => $banner->image,
                                "link" => $banner->link,   
                                "link_label" => $banner->link_label,
                                "description" => $banner->description,
                                'created_at' => $banner->created_at,
                                "bg_color" => $banner->bg_color,
                                "active" => $banner->active
                            ]),
        ]);
    }
 /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return Inertia::render('Banners/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
        //
        $banner = Banner::create($request->all());

        // foreach($request->file("images") as $file){
        //     $path = $file->store('banners/'.$banner->id.'/thumb','public');
        //     $banner->image = $path;
        //     $banner->save();
        // }
        return redirect()->route('banner.index');
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
        $banner = Banner::find($id);
        return Inertia::render('Banners/Edit',['banner' => $banner]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        Banner::where('id',$id)->update($request->only(["title","heading","description","link","image","link_label","active","bg_color"]));

        // if(!empty($request->deletedAttrImg)){            
        //     foreach ($request->deletedAttrImg as $key => $image) {
        //         unlink(public_path($image["path"]));
        //     }
        // }
        // // 
        // $banner  = Banner::find($id);

        // if(!empty($request->deletedAttrImg)){            
        //     foreach ($request->deletedAttrImg as $key => $image) {
        //         $dbPath = str_replace("/storage/","",$image["path"]);
        //         unlink(public_path($dbPath));
        //     }
        // }
        // // 

        // if($request->hasFile('images')){
        //     foreach($request->file("images") as $file){
        //         $path = $file->store('banners/'.$banner->id.'/thumb','public');
        //         $banner->image = $path;
        //         $banner->save();
        //     }
        // }else{
        //     $banner->image = $request->get("imageSrc");
        //     $banner->save();
        // }

        return redirect()->route('banner.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
