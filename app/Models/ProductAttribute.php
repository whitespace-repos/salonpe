<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class ProductAttribute extends Model
{
    use HasFactory;

    protected $fillable = ['product_id',  'attribute_type',  'attribute_data',  'bar_code',  'hsn_code',  'ean_code',  'gst_amount',  'mrp',     'discounted_mrp',  'purchase_price',  'wholesale_price',  'salon_price',  'tax',     'quantity',  'additional_description'];
    protected $appends = ['wishlist'];

    public function media(){
        return $this->hasMany(Media::class,'associate_id','id');
    }

    public function product(){
        return $this->belongsTo(Product::class,'product_id');
    }
    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
            'attribute_type' => 'array',
            'attribute_data' => 'object',
    ];

    protected function wishlist(): Attribute
    {
        //get: fn ($value , $attributes) => (Auth::check()) ? Wishlist::where([ 'user_id' => Auth::id() , 'attribute_id' => $attributes['id']])->exists() : false,
        return Attribute::make(
            get: fn ($value , $attributes) => (Auth::check()) ? Wishlist::where([ 'user_id' => Auth::id() , 'attribute_id' => $attributes['id']])->exists() : false,
        );
    }


}
