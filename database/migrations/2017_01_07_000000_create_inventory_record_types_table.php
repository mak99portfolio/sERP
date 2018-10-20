<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInventoryRecordTypesTable extends Migration{

    public function up(){

        Schema::create('inventory_record_types', function (Blueprint $table){

            $table->increments('id');
            $table->string('inventory_record_type_no')->unique();
            $table->string('name')->unique();
            $table->string('short_name')->unique();
            $table->integer('creator_user_id')->unsigned()->nullable();
            $table->integer('updator_user_id')->unsigned()->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('creator_user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('updator_user_id')->references('id')->on('users')->onDelete('cascade');

        });

    }


    public function down(){

        Schema::dropIfExists('inventory_record_types');

    }

}
