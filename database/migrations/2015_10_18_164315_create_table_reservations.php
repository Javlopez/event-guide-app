<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableReservations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function(Blueprint $table){
            $table->increments('id');
            $table->integer('stand_id')->unsigned();
            $table->string('name');
            $table->string('email');
            $table->string('address');
            $table->string('documents');
            $table->string('header_image');
            $table->timestamps();

            $table
                ->foreign('stand_id')
                ->references('id')
                ->on('stands')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('reservations');
    }
}
