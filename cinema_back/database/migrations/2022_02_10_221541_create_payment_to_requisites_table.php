<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentToRequisitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_to_requisites', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('verified')->default(0);
            $table->string('organization_name');
            $table->string('bank_name');
            $table->bigInteger('payment_account');
            $table->bigInteger('correspondent_account');
            $table->bigInteger('ogrn');
            $table->bigInteger('inn');
            $table->bigInteger('kpp');
            $table->bigInteger('bik');
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
        Schema::dropIfExists('payment_to_requisites');
    }
}
