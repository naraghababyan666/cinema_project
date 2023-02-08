<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUploadDocs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('upload_docs', function (Blueprint $table) {
            $table->id();
            $table->integer('verified')->default(0);
            $table->unsignedInteger('user_id');
            $table->string('hall_type');
            $table->string('personName');
            $table->string('name_theatre');
            $table->string('document_ogrn_text');
            $table->text('document_ogrn_photo');
            $table->string('region');
            $table->string('city');
            $table->string('house');
            $table->text('person_name');
            $table->text('person_position');
            $table->string('person_photo');
            $table->text('new_hall_name');
            $table->text('new_hall_scheme_photo');
            $table->text('new_hall_row_count');
            $table->text('new_hall_seat_count');
            $table->text('new_hall_hardware_description');
            $table->text('new_hall_hardware_photo');
            $table->text('new_hall_screen_width');
            $table->text('new_hall_screen_length');
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
        Schema::dropIfExists('upload_docs');
    }
}
