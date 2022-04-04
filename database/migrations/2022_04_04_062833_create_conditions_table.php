<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConditionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conditions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('condition'); 
            $table->string('body');  
            $table->string('image1_path')->nullable();  
            $table->integer('Morning'); 
            $table->string('image2_path')->nullable();  
            $table->integer('Lunch'); 
            $table->string('image3_path')->nullable();  
            $table->integer('Dinner'); 
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
        Schema::dropIfExists('conditions');
    }
}
