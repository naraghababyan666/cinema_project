<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UploadDocs extends Model
{
    use HasFactory;
    protected $table = 'upload_docs';
    public $timestamps = false;
    protected $fillable = [
        'user_id',
        'verified',
        'hall_type',
        'personName',
        'name_theatre',
        'document_ogrn_text',
        'document_ogrn_photo',
        'region',
        'city',
        'house',
        'person_name',
        'person_position',
        'person_photo',
        'new_hall_name',
        'new_hall_scheme_photo',
        'new_hall_row_count',
        'new_hall_seat_count',
        'new_hall_hardware_description',
        'new_hall_hardware_photo',
        'new_hall_screen_width',
        'new_hall_screen_length',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
