<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MakePercent extends Model
{
    use HasFactory;
    protected $fillable = [ 'percent' ];
}
