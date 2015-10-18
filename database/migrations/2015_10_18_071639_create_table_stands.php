<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableStands extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stands', function(Blueprint $table){
            $table->increments('id');
            $table->string('name');
            $table->integer('event_id')->unsigned();
            $table->integer('status')->unsigned();
            $table->timestamps();

            $table
                ->foreign('event_id')
                ->references('id')
                ->on('events')
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
        Schema::drop('stands');
    }
}
