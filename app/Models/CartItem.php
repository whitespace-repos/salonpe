<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    use HasFactory;

    protected $casts = [
            'product' => 'object',
            'attribute' => 'object'
    ];
    
    protected $fillable = [
            "cart_id",
            "product_id",
            "product_attribute_id",
            "is_gift",
            "quantity",
            "applied_price",
            "payble_price",
            "grand_total",
            "discount",
            "status",
            "mrp",
            "product",
            "attribute", 
    ];
}
