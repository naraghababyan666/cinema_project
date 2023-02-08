<?php

namespace App\Models;

use App\Traits\AddEdit;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeanceStatus extends Model
{
    use HasFactory;
    use AddEdit;
    protected $table = 'seance_statuses';
    protected $fillable = [
        'title',
    ];
}
