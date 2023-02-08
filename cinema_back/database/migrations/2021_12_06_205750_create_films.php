<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilms extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('films', function (Blueprint $table) {
            $table->id();
            $table->integer('is_active')->default(1);
            $table->unsignedBigInteger('format_id');
            $table->unsignedBigInteger('user_id');
            $table->integer('rent_id')->default(0);
            $table->string('platform');
            $table->string('title');
            $table->text('description');
            $table->integer('duration');
            $table->string('kdm')->nullable();
            $table->text('file');
            $table->text('image');
            $table->text('certificate_image');
            $table->text('law_image');
            $table->integer('rating')->default(10);
            $table->integer('rating_all')->nullable();
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
        Schema::dropIfExists('films');
    }
}
