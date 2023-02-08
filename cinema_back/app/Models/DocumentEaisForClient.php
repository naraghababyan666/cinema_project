<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentEaisForClient extends Model
{
    use HasFactory;
    protected $table = 'eais_document_for_client';
    protected $fillable = [
        'hall_id',
        'name',
        'email',
        'country_code',
        'phone',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'name', 'name');
    }
    public function halls(){
        return $this->belongsTo(HallsInDocument::class, 'hall_id', "id");
    }


//    public function hall
}
