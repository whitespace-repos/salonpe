<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Order extends Model
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
        "payment_id",
        "delivered",
        "address_id",
    ];


    
    public function cart(): BelongsTo
    {
        return $this->belongsTo(Cart::class);
    }

    public function track(): HasOne
    {
        return $this->hasOne(TrackOrder::class);
    }


}
