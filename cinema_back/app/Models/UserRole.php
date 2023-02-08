<?php

namespace App\Models;

use App\Traits\AddEdit;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    use HasFactory;
    use AddEdit;
    protected $table = 'user_roles';
    protected $fillable = [
        'title',
    ];
}
