<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        //
      Schema::create('persons', function(Blueprint $table)
      {
         $table->increments('id');
         $table->string('firstname');
         $table->string('lastname');
         $table->string('typeid');
         $table->string('noid');
         $table->string('mobile');
         $table->string('email');
         $table->string('photourl');
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
        //
    }
}
