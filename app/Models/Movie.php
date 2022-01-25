<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $fillable = [
        'title',
        'year',
        'director',
        'poster',
        'rented',
        'synopsis'
    ];

    protected $table = "movies";

    use HasFactory;
}
