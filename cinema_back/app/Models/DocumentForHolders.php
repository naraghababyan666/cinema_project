<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentForHolders extends Model
{
    use HasFactory;
    protected $table = 'document_for_holders';
    public $fillable = [
        'user_id',
        'form_type',
        'name',
        'passport'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
