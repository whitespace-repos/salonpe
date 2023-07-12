<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Media;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class MediaController extends Controller
{
    
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //

        return Inertia::render('Uploads/Index', [
            'filters' => ['search', 'trashed'],
            'uploads' => Media::orderBy('id','desc')
                            ->where(function($query) use($request){
                                if($request->has("search")){
                                    $searchBy = ($request->has("by")) ? $request->by : "name";
                                    $query->where($searchBy,'LIKE','%'.$request->search."%");
                                }                  
                            })
                            ->where("associated","Upload")
                            ->paginate(10)                            
                            ->onEachSide(0)
                            ->withQueryString()
                            ->through(fn ($file) => [
                                'id' => $file->id,
                                'name' => $file->name,
                                "path" => $file->path,
                                "size" => $file->size,
                                "format" => $file->format,
                                "author" => auth()->user(),
                                'created_at' => $file->created_at
                            ]),
        ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //    
        return Inertia::render("Uploads/Create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 
        $associatedNames = explode(',', $request->names);

        //
        if($request->hasFile('images')){
            
            foreach($request->file("images") as $key => $file){
                $extension = $file->extension();
                $originalName = time().'_'.$file->getClientOriginalName();
                $filename = Str::slug(pathinfo($originalName, PATHINFO_FILENAME), "-");
                $path = "uploads/".$filename.".".$extension;
                // 
                
                \Tinify\setKey("PdG6xp3wD4tQX5gnK5xdlpLmdWynn8QS");
                $source = \Tinify\fromFile($file);
                $source->toFile(storage_path("app/public/".$path));
                $size = Storage::size('public/'.$path);
                Media::create([
                                    "associated" => "Upload",
                                    "associate_id" => null,
                                    "path" => "/storage/".$path,
                                    "name" => Str::of(empty($associatedNames[$key]) ? pathinfo($originalName, PATHINFO_FILENAME) : $associatedNames[$key])->trim(),
                                    "format" => $extension,
                                    "size" => $this->formatBytes($size),
                                    "author" => auth()->id()
                ]);                
            }
            // 
            return redirect()->route("media.index");
        }        
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

    public static function formatBytes($size, $precision = 2)
    {
        if ($size > 0) {
            $size = (int) $size;
            $base = log($size) / log(1024);
            $suffixes = array(' bytes', ' KB', ' MB', ' GB', ' TB');

            return round(pow(1024, $base - floor($base)), $precision) . $suffixes[floor($base)];
        } else {
            return $size;
        }
    }
}
