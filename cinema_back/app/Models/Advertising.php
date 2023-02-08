<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advertising extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'hall_id',
        'title',
        'duration',
        'file',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function hall(){
        return $this->belongsTo(HallsInDocument::class, 'hall_id', 'id');
    }

    public function seance(){
        return $this->belongsTo(SeanceAdvertisements::class, 'advertisement_id', 'id');
    }
}
