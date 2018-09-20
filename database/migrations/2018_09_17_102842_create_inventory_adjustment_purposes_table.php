<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInventoryAdjustmentPurposesTable extends Migration{

    public function up(){

        Schema::create('inventory_adjustment_purposes', function (Blueprint $table){
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('short_name')->unique()->nullable();
            $table->integer('creator_user_id')->unsigned()->nullable();
            $table->foreign('creator_user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('updator_user_id')->unsigned()->nullable();
            $table->foreign('updator_user_id')->references('id')->on('users')->onDelete('cascade');
            $table->softDeletes();
            $table->timestamps();
        });

    }


    public function down(){

        Schema::dropIfExists('inventory_adjustment_purposes');

    }
}
