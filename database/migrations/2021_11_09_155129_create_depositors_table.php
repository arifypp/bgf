<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepositorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('depositors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('traxId')->unique();
            $table->string('paymentType')->nullable();
            $table->string('amount')->nullable();
            $table->string('bankname')->nullable();
            $table->string('bankAcc')->nullable();
            $table->string('checkNo')->nullable();
            $table->string('mobileNo')->nullable();
            $table->string('mobileTrx')->nullable();
            $table->string('userID')->nullable();
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
        Schema::dropIfExists('depositors');
    }
}
