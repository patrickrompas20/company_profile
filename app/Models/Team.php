<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Team extends Model
{
    use HasFactory;

    protected $guarded = [];


    protected function image(): Attribute
    {
        return Attribute::make(
            get: fn($value) => asset('/storage/teams/' . $value),
        );
    }
}
