<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Banner extends Model
{
    use HasFactory;

    protected $fillable = ['title',   'heading' , 'link',    'image',   'Description' , 'link_label' , 'author',"bg_color","active"];


    protected function author(): Attribute
    {
        return Attribute::make(
            set: fn () => auth()->id(),
        );
    }

       /**
     * Get the user's first name.
     */
    // protected function image(): Attribute
    // {
    //     return Attribute::make(
    //         get: fn (string $value) => "/storage/".$value,
    //     );
    // }
}


