<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDistrictsTable extends Migration{

    public function up(){

        Schema::create('districts', function (Blueprint $table){
            $table->increments('id');
            $table->integer('country_id')->unsigned();
            $table->integer('division_id')->unsigned();
            $table->string('name');
            $table->timestamps();
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');
            $table->foreign('division_id')->references('id')->on('divisions')->onDelete('cascade');
        });

    }


    public function down(){

        Schema::dropIfExists('districts');

    }

}
