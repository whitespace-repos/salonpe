<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Tag;
use Category;
use Inertia\Inertia;

class Tags extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        return Inertia::render('Tags/Index', [
            'filters' => ['search', 'trashed'],
            'tags' => Tag::orderBy('id')
                            ->where(function($query) use($request){
                                if($request->has("search")){
                                    $searchBy = ($request->has("by")) ? $request->by : "name";
                                    $query->where($searchBy,'LIKE','%'.$request->search."%");
                                }                  
                            })
                            ->paginate(10)
                            ->onEachSide(0)
                            ->withQueryString()
                            ->through(fn ($tag) => [
                                'id' => $tag->id,
                                'name' => $tag->name,    
                                'category' => $tag->category,                            
                                'created_at' => $tag->created_at,
                            ]),
        ]);
    }
 /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $categories = Category::with('subCategories')->where('parent_id',null)->get();  
        return Inertia::render('Tags/Create',["categories" => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        Tag::create($request->all());
        return redirect()->route('tag.index');
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
        $tag = Tag::find($id);
        $categories = Category::with('subCategories')->where('parent_id',null)->get();  
        return Inertia::render('Tags/Edit',['tag' => $tag , "categories" => $categories]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        Tag::where('id',$id)->update($request->all());
        return redirect()->route('tag.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
