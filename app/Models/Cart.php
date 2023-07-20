<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Cart extends Model
{
    use HasFactory;

    protected $casts = [
            'product' => 'object',
            'attribute' => 'object'
    ];

    protected $fillable = [
                                "user_id",
                                "coupon",
                                "coupon_discount",
                                "is_gift",
                                "quantity",
                                "payble_price",
                                "grand_total",
                                "discount",
                                "status",
                                "address_id",
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function items() : HasMany 
    {
        return $this->hasMany(CartItem::class);
    }

    public function order() : HasOne
    {
        return $this->hasOne(Order::class);
    }
}
