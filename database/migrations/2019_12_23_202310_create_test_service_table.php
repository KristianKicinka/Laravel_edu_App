<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestServiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('test_service', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('test_id');
            $table->time('duration');
            $table->double('percentage');
            $table->dateTime('expiration');
            $table->json('activate_for');
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
        Schema::dropIfExists('test_service');
    }
}
