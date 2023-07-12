<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\AsArrayObject;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Setting extends Model
{
    use HasFactory;
    protected $appends = ['products','categories' ,'brands'];
      /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [        
            'data' => AsArrayObject::class,
    ];

    protected function products(): Attribute
    {
        return new Attribute(
            get: fn ($value, $attributes) => ($attributes['data_type'] == "Entity" && $attributes['entity'] == 'Product') ? Product::with('category',"attributes.media")->select(["id","name","thumb_image","product_type","category_id","product_description","how_to_use","ingredients"])->orderByRaw("RAND()")->whereIn('id',$this->data)->get() : []
        );
    }
    
    protected function categories(): Attribute
    {
        return new Attribute(
            get: fn ($value, $attributes) => ($attributes['data_type'] == "Entity" && $attributes['entity'] == 'Category') ? Category::select(['id','name','parent_id','image'])->whereIn('id',$this->data)->orderBy("id","desc")->get() : []
        );
    }


    protected function brands(): Attribute
    {
        return new Attribute(
            get: fn ($value, $attributes) => ($attributes['data_type'] == "Entity" && $attributes['entity'] == 'Brand') ? Brand::select(['id','name','image'])->whereIn('id',$this->data)->orderBy("id","desc")->get() : []
        );
    }
}
