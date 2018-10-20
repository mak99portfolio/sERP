<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInventoryStatusAdjustmentsTable extends Migration{

    public function up(){

        Schema::create('inventory_status_adjustments', function (Blueprint $table){

            $table->increments('id');
            $table->string('inventory_status_adjustment_no')->unique();
            $table->integer('working_unit_id')->unsigned()->nullable();
            $table->integer('selected_type_id')->unsigned()->nullable();
            $table->integer('selected_status_id')->unsigned()->nullable();
            $table->integer('adjusted_status_id')->unsigned()->nullable();
            $table->integer('product_id')->unsigned()->nullable();
            $table->integer('quantity')->default(0);
            $table->date('date')->nullable();
            $table->integer('creator_user_id')->unsigned()->nullable();
            $table->integer('updator_user_id')->unsigned()->nullable();
            $table->text('remarks')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('working_unit_id')->references('id')->on('working_units')->onDelete('cascade');
            $table->foreign('selected_type_id')->references('id')->on('product_types')->onDelete('cascade');
            $table->foreign('selected_status_id')->references('id')->on('product_statuses')->onDelete('cascade');
            $table->foreign('adjusted_status_id')->references('id')->on('product_statuses')->onDelete('cascade');
            $table->foreign('creator_user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('updator_user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            
        });

    }


    public function down(){

        Schema::dropIfExists('inventory_status_adjustments');

    }

}
