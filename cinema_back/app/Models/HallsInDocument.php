<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HallsInDocument extends Model
{
    use HasFactory;
    protected $table = 'halls_in_document';
    public $timestamps = false;
    protected $fillable = [
        'user_id',
        'name_theatre',
        'name_hall',
        'region',
        'city',
        'house',
        'hall_seats',
        'hall_rows',
        'voice_hardware',
        'screen_width',
        'screen_length',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
