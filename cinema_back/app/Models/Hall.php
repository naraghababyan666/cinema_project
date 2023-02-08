<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hall extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'title', 'seats', 'start', 'end', 'mark_video', 'mark_audio'
    ];

    // dd(Hall::create([
    //     'user_id' => auth()->id(),
    //     'title' => 'hall 3',
    //     'seats' => 33,
    //     'start' => now(),
    //     'end' => now()->addHour(),
    //     'mark_video' => 1,
    //     'mark_audio' => 1
    // ]));

}
