<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentToSystemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_to_systems', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('verified')->default(0);
            $table->string('card_number_extrafintech');
            $table->string('bank_name');
            $table->string('card_number_receiver');
            $table->string('inn');
            $table->string('kpp');
            $table->string('bik');
            $table->string('all_income');
            $table->string('wanted_total');
            $table->string('balance');

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
        Schema::dropIfExists('payment_to_systems');
    }
}
