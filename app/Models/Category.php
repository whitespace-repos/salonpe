<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Staudenmeir\EloquentEagerLimit\HasEagerLimit;

class Category extends Model
{
    use HasFactory , HasEagerLimit ;

    protected $fillable = ['name','parent_id','image','description'];


    public function subCategories(){
        return $this->hasMany(Category::class,'parent_id','id');
    }

    public function subCategoriesWithLimit(){
        return $this->hasMany(Category::class,'parent_id','id')->limit(10);
    }


    public function children(){
        return $this->hasMany(Category::class,'parent_id','id');
    }

    public function category(){
        return $this->hasOne(Category::class,'id','parent_id');
    }

    public function subCategoryProducts() {
        return $this->belongsTo(Product::class);
    }


}
