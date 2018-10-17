<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOwnVehiclesTable extends Migration{

    public function up(){

        Schema::create('own_vehicles', function (Blueprint $table){

            $table->increments('id');
            $table->string('vehicle_no')->unique();
            $table->integer('employee_profile_id')->unsigned();
            $table->string('license_number')->nullable();
            $table->integer('creator_user_id')->unsigned()->nullable();
            $table->integer('updator_user_id')->unsigned()->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('employee_profile_id')->references('id')->on('employee_profiles')->onDelete('cascade');
            $table->foreign('creator_user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('updator_user_id')->references('id')->on('users')->onDelete('cascade');

        });

    }

    public function down(){

        Schema::dropIfExists('own_vehicles');

    }
}
