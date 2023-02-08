<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyName extends Model
{
    use HasFactory;
    protected $table = 'company_name';
    public $timestamps = false;
    protected $fillable = [
        'personName',
        'first_doc_text',
        'first_doc_photo',
        'second_doc_text',
        'second_doc_photo',
        'third_doc_text',
        'third_doc_photo',
        'address',
        'person_name',
        'person_photo',
        'payment_order_name',
        'payment_order_card',
        'payment_inn',
        'payment_kpp',
        'payment_bik',
        'description_scheme_photo',
        'hall_width',
        'hall_length',
        'hall_height',
        'description_file',
        'hardware_info',
        'hardware_photo',
        'hall_screen_width',
        'hall_screen_length',
        'description_hall_photo',
        'add_hall_scheme_photo',
        'add_hall_width',
        'add_hall_length',
        'add_hall_height',
        'add_hall_cresel_photo',
        'add_hall_hardware_info',
        'add_hall_hardware_photo',
        'add_hall_screen_width',
        'add_hall_screen_length',
        'add_hall_photo',
    ];
}
