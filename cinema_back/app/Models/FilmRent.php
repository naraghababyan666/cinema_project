<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FilmRent extends Model
{
    use HasFactory;
    protected $table = 'film_rent';
    public $timestamps = false;
}
