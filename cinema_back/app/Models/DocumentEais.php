<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentEais extends Model
{
    use HasFactory;
    protected $table = 'document_eais';
    public $timestamps = false;
    protected $fillable = [
        'user_id',
        'date_of_completion',
        'demonistrator_film_name',
        'id_hall',
        'cinema_network_name',
        'cinema_network_id',
        'cinema_network_email',
        'legal_entity_name',
        'legal_entity_address',
        'ogrn_code',
        'inn',
        'demonistrator_film_region',
        'demonistrator_film_city',
        'demonistrator_film_locality',
        'demonistrator_film_street',
        'demonistrator_film_email',
        'telephone_fax',
        'demonistrator_film_site',
        'autoinformer_number',
        'full_name',
        'name_and_hardware_name_hall',
        'name_and_hardware_seats_in_hall',
        'name_and_hardware_support',
        'hardware_projector_manufacturer',
        'hardware_projector_model',
        'hardware_projector_serial_number',
        'hardware_server_manufacturer',
        'hardware_server_model',
        'hardware_server_serial_number',
        'hardware_type_name_hall',
        'hardware_type',
        'hardware_type_other_settings',
        'hardware_type_add_date',
        'voice_hardware_name_hall',
        'voice_hardware_analog_manufacturer',
        'voice_hardware_analog_model',
        'voice_hardware_digital_manufacturer',
        'voice_hardware_digital_model',
        'ticketing_software_manufacturer',
        'placement_demonistration_film',
        'regularity_film_showing',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
