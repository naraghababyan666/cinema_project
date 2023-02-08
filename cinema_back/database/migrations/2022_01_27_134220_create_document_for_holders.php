<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentForHolders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('document_for_holders', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('verified')->default(0);
            $table->string('form_type');
            $table->string('name');
            $table->text('passport');
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
        Schema::dropIfExists('document_for_holders');
    }
}
