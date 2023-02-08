<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentEais extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('document_eais', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->unsigned();
            $table->string('date_of_completion');
            $table->string('demonistrator_film_name');
            $table->string('id_hall');
            $table->string('cinema_network_name');
            $table->string('cinema_network_id');
            $table->string('cinema_network_email');
            $table->string('legal_entity_name');
            $table->string('legal_entity_address');
            $table->string('ogrn_code');
            $table->string('inn');
            $table->string('demonistrator_film_region');
            $table->string('demonistrator_film_city');
            $table->string('demonistrator_film_locality');
            $table->string('demonistrator_film_street');
            $table->string('demonistrator_film_email');
            $table->string('telephone_fax');
            $table->string('demonistrator_film_site');
            $table->string('autoinformer_number');
            $table->string('full_name');
            $table->string('name_and_hardware_name_hall');
            $table->string('name_and_hardware_seats_in_hall');
            $table->string('name_and_hardware_support');
            $table->string('hardware_projector_manufacturer');
            $table->string('hardware_projector_model');
            $table->string('hardware_projector_serial_number');
            $table->string('hardware_server_manufacturer');
            $table->string('hardware_server_model');
            $table->string('hardware_server_serial_number');
            $table->string('hardware_type_name_hall');
            $table->string('hardware_type')->nullable();
            $table->string('hardware_type_other_settings')->nullable();
            $table->string('hardware_type_add_date');
            $table->string('voice_hardware_name_hall');
            $table->string('voice_hardware_analog_manufacturer');
            $table->string('voice_hardware_analog_model');
            $table->string('voice_hardware_digital_manufacturer');
            $table->string('voice_hardware_digital_model');
            $table->string('ticketing_software_manufacturer');
            $table->string('placement_demonistration_film');
            $table->string('regularity_film_showing');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('document_eais');
    }
}
