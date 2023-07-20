<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
                                "first_name",
                                "last_name",
                                "address_1",
                                "address_2",
                                "email",
                                "phone",
                                "company",
                                "state",
                                "zip",
                                "country",
                                "plain",
                                "customer",
    ];


    /**
     * Interact with the user's first name.
     */
    protected function plain(): Attribute
    {
        return Attribute::make(
            set: fn ($value , $attributes) => $attributes["first_name"].' '.$attributes["last_name"].' <br /> '.$attributes["address_1"].','.$attributes["address_2"].'<br />'.$attributes["email"].' , '.$attributes["phone"].' , '.$attributes["company"].'<br />'.$attributes["country"].' - '.$attributes["state"].'-'.$attributes["zip"],
        );
    }

    protected function customer(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => auth()->user()->id,
        );
    }

}
