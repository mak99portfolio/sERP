<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInventoryStockAdjustmentsTable extends Migration{

    public function up(){

        Schema::create('inventory_stock_adjustments', function (Blueprint $table){
            $table->increments('id');
            $table->string('inventory_stock_adjustment_id')->unique();
            $table->integer('working_unit_id')->unsigned()->nullable();
            $table->string('adjustment_type')->default('stock_in');
            $table->integer('inventory_adjustment_purpose_id')->nullable();
            $table->integer('inventory_item_status_id')->unsigned()->nullable();
            $table->integer('inventory_item_pattern_id')->unsigned()->nullable();
            $table->integer('creator_user_id')->unsigned()->nullable();
            $table->integer('updator_user_id')->unsigned()->nullable();
            $table->text('remarks')->nullable();
            $table->softDeletes();
            $table->timestamps();


            $table->foreign('working_unit_id')->references('id')->on('working_units')->onDelete('cascade');
            $table->foreign('inventory_item_status_id')->references('id')->on('inventory_item_statuses')->onDelete('cascade');
            $table->foreign('inventory_item_pattern_id')->references('id')->on('inventory_item_patterns')->onDelete('cascade');
            $table->foreign('creator_user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('updator_user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('inventory_adjustment_purpose_id')->references('id')->on('inventory_adjustment_purposes')->onDelete('cascade');

        });

    }


    public function down(){

        Schema::dropIfExists('inventory_stock_adjustments');

    }

}
