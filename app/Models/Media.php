<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Builder; 

class Media extends Model
{
    use HasFactory;

    protected $fillable = ['associated','path','associate_id','featured','name','author','size','format','image_order'];

    protected static function boot()
    {
        parent::boot();
     
        // Order by name ASC
        static::addGlobalScope('order', function (Builder $builder) {
            $builder->orderBy('image_order', 'asc');
        });
    }
   
}
