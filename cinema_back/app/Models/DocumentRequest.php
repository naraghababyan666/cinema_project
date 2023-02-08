<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentRequest extends Model
{
    use HasFactory;
    protected $table = 'document_request';
    public $timestamps = false;
    public $fillable = [
        'user_email',
        'films',
        'section',
        'time'
    ];
}
