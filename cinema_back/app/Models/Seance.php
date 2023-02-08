<?php

namespace App\Models;

use App\Traits\AddEdit;
use Carbon\Carbon;
use DateInterval;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seance extends Model
{
    use HasFactory;
    use AddEdit;

    protected $fillable = [
        'status_id', 'film_id', 'hall_id', 'day', 'start', 'duration_advertising', 'duration_service', 'tickets_amt', 'tickets_price', 'visitors_amt'
    ];

    //    protected $casts = [
    //        'start' => 'timestamp',
    //    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function film()
    {
        return $this->belongsTo(Film::class);
    }

    public function status()
    {
        return $this->belongsTo(SeanceStatus::class,'status_id','id');
    }
    public function halls(){
        return $this->belongsTo(HallsInDocument::class, 'hall_id', 'id');
    }
//
//    public function advertisement(){
//        return $this->hasManyThrough(Advertising::class, SeanceAdvertisements::class, 'seance_id', 'id');
//    }

    public function advertisement(){
        return $this->belongsToMany(Advertising::class, 'seance_advertisements', 'seance_id', 'advertisement_id');
    }

    // public function started()
    // {
    //     // $startDay = Carbon::parse($this->day);

    //     if($this->day > Carbon::today()){
    //         return false;
    //     }
    //     return $this->start < Carbon::now()->format('H:i');
    // }

    // public function ended()
    // {
    //     $startDay = Carbon::parse($this->day);
    //     if($startDay < Carbon::today()){
    //         return true;
    //     }else if ($startDay = Carbon::today()){
    //         $duration = $this->film->duration + $this->duration_advertising + $this->duration_service;
    //         $endTime = Carbon::parse($this->start)->addMinutes($duration)->format('H:i');
    //         return   $endTime < Carbon::now()->format('H:i');
    //     }

    //     return false;
    // }

    public function started()
    {
        if($this->day > Carbon::today()){
            return false;
        }
        return  $this->start < Carbon::now()->format('H:i');
    }

    public function ended()
    {
        if($this->day > Carbon::today()){
            return false;
        }

        $duration = $this->film->duration + $this->duration_advertising + $this->duration_service;

        $endTime = Carbon::parse($this->start)->addMinutes($duration)->format('H:i');
        return   $endTime < Carbon::now()->format('H:i');
    }
}
