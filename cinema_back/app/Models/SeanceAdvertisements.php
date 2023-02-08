<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeanceAdvertisements extends Model
{
    use HasFactory;
    protected $fillable = [
        'advertisement_id', 'seance_id',
    ];
//
//    protected function seance(){
//        return $this->hasOne(Seance::class, 'seance_id', 'id');
//    }
    public function advertisings(){
        return $this->belongsTo(Advertising::class, 'advertisement_id', 'id');
    }
}
