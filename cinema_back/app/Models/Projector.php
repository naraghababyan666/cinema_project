<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projector extends Model
{
    use HasFactory;
    const UPDATED_AT = null;
    const CREATED_AT = null;
    protected $fillable = [
        'user_id',
        'projector_name',
        'projector_number'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
