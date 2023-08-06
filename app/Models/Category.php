<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Staudenmeir\EloquentEagerLimit\HasEagerLimit;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Category extends Model
{
    use HasFactory , HasEagerLimit ;

    protected $fillable = ['name','parent_id','image','description'];
    //protected $appends = ['products_count'];


    public function subCategories(): HasMany{
        return $this->hasMany(Category::class,'parent_id','id');
    }

    public function subCategoriesWithLimit(){
        return $this->hasMany(Category::class,'parent_id','id')->limit(10);
    }


    public function children(): HasMany{
        return $this->hasMany(Category::class,'parent_id','id');
    }

    public function category(): HasOne{
        return $this->hasOne(Category::class,'id','parent_id');
    }

    public function subCategoryProducts(): BelongsTo {
        return $this->belongsTo(Product::class);
    }

      /**
     * Get all of the posts for the user.
     */
    public function products(): HasMany
    {
        return $this->hasMany(Product::class,'sub_category_id','id');
    }

    // protected function productsCount(): Attribute
    // {
    //     return Attribute::make(
    //         get: fn ($value) => $this->products()->count(),
    //     );
    // }


}
