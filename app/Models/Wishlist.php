<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Wishlist extends Model
{
    use HasFactory,SoftDeletes;
    // 
    protected $casts = [
            'product' => 'object',
            'attribute' => 'object',
            "moved_to_cart" => 'boolean',
    ];
    // 
    protected $fillable = ["user_id","product_id","attribute_id","product","attribute","moved_to_cart"];
}
