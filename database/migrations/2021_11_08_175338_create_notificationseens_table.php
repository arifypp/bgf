<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationseensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notificationseens', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('userid');
            $table->integer('notificationID');
            $table->integer('seen')->default('0')->comment("0 for unseen 1 for seen");
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
        Schema::dropIfExists('notificationseens');
    }
}
