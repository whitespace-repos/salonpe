<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrackOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'cart_id',
        'user_id',
        "confirmed",
        "confirmed_at",
        "shipped",
        "shipped_at",
        "on_the_way",
        "delivered",
        "delivered_at",
    ];
}
