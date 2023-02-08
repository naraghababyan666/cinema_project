<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEaisDocumentForClient extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eais_document_for_client', function (Blueprint $table) {
            $table->id();
            $table->integer('hall_id');
            $table->string('name');
            $table->string('email');
            $table->bigInteger('country_code');
            $table->bigInteger('phone');
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
        Schema::dropIfExists('eais_document_for_client');
    }
}
