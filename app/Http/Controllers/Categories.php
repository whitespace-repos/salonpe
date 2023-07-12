<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Category;
use Inertia\Inertia;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class Categories extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        return Inertia::render('Categories/Index', [
            'filters' => ['search', 'trashed'],
            'categories' => Category::orderBy('id')
                            ->where(function($query) use($request){
                                if($request->has("search")){
                                    $searchBy = ($request->has("by")) ? $request->by : "name";
                                    $query->where($searchBy,'LIKE','%'.$request->search."%");
                                }                  
                            })
                            ->whereNull("parent_id")
                            ->paginate(10)
                            ->onEachSide(0)
                            ->withQueryString()
                            ->through(fn ($category) => [
                                'id' => $category->id,
                                'name' => $category->name,
                                'created_at' => $category->created_at
                            ]),
        ]);  
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return Inertia::render('Categories/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //        
        $category = Category::create($request->only(['name']));
        if($request->hasFile('images')){
            foreach($request->file("images") as $file){
                $path = $file->store('categories/'.$category->id.'/thumb','public');
                $category->image = '/storage/'.$path;
                $category->save();
            }
        }        
        return redirect()->route('category.index');                
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
        $category = Category::find($id);
        return Inertia::render('Categories/Edit',['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        Category::where("id",$id)->update($request->only(['name']));
        $category = Category::find($id);
        if(!empty($request->deletedAttrImg)){            
            foreach ($request->deletedAttrImg as $key => $image) {
                unlink(public_path($image["path"]));
            }
        }

        if($request->hasFile('images')){
            foreach($request->file("images") as $file){
                $extension = $file->extension();
                $originalName = time().'_'.$file->getClientOriginalName();
                $filename = Str::slug(pathinfo($originalName, PATHINFO_FILENAME), "-");
                $path = "categories/".$category->id."/thumb/".$filename.".".$extension;
                //                 
                \Tinify\setKey("PdG6xp3wD4tQX5gnK5xdlpLmdWynn8QS");
                $source = \Tinify\fromFile($file);
                $source->toFile(storage_path("app/public/".$path));
                $category->image = '/storage/'.$path;
                $category->save();
            }
        }     
        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }  
    
    
    /**
     * 
     */
    public function subCategoryIndex(Request $request) {
        //
        return Inertia::render('Categories/Sub/Index', [
            'filters' => ['search', 'trashed'],
            'categories' => Category::whereNull('parent_id')->get(),
            'subCategories' => Category::with('category')
                                ->orderBy('parent_id')
                                ->where(function($query) use($request){
                                    if($request->has("search")){
                                        $searchBy = ($request->has("by")) ? $request->by : "name";
                                        $query->where($searchBy,'LIKE','%'.$request->search."%");
                                    }                  
                                    if($request->has("category"))
                                        $query->where("parent_id",$request->category);
                                    // 
                                })
                                ->whereNotNull("parent_id")
                                ->paginate(10)
                                ->onEachSide(0)
                                ->withQueryString()
                                ->through(fn ($category) => [
                                    'id' => $category->id,
                                    'name' => $category->name,
                                    'created_at' => $category->created_at,
                                    'category' => $category->category,
                                    "parent_id" => $category->parent_id
                                ]),
        ]);  
    }

    public function subCategoryCreate(){
        $categories = Category::whereNull("parent_id")->get();
        return Inertia::render('Categories/Sub/Create',["categories" => $categories]);
    }


    public function subCategoryStore(Request $request){
        $data = [
                    "name" => $request->name,
                    "parent_id" => $request->parent_id["id"]
        ];
        //  
        Category::create($data);
        return redirect()->route('sub.category.index'); 
    }
}
