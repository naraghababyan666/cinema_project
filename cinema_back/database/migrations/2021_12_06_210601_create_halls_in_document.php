<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHallsInDocument extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('halls_in_document', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('name_theatre');
            $table->string('name_hall');
            $table->string('region');
            $table->string('city');
            $table->string('house');
            $table->integer('hall_seats')->default(80);
            $table->integer('hall_rows')->default(8);
            $table->string('voice_hardware');
            $table->integer('screen_width');
            $table->integer('screen_length');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('halls_in_document');
    }
}
