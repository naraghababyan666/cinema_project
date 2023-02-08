<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeances extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seances', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('status_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->unsignedInteger('hall_id');
            $table->unsignedInteger('film_id');
            $table->integer('is_repeat')->default(1);
            $table->string('day');
            $table->string('start');
            $table->integer('duration_advertising')->nullable();
            $table->integer('duration_service')->nullable();
            $table->text('tickets_amt')->nullable();
            $table->bigInteger('tickets_price');
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
        Schema::dropIfExists('seances');
    }
}
