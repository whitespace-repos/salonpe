<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'cart_id',
        'user_id',
        "quantity",
        "mrp",
        "applied_price",
        "payble_price",
        "grand_total",
        "discount",
        "payment",
        "payment_id"
    ];
}
