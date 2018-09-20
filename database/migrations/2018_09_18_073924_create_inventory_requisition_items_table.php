<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInventoryRequisitionItemsTable extends Migration{

    public function up(){

        Schema::create('inventory_requisition_items', function (Blueprint $table){
            $table->increments('id');
            $table->integer('inventory_requisition_id')->unsigned();
            $table->integer('product_id')->unsigned();
            $table->integer('inventory_item_status_id')->unsigned()->nullable();
            $table->integer('inventory_item_pattern_id')->unsigned()->nullable();
            $table->integer('requested_quantity')->unsigned()->default(0);
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('inventory_requisition_id')->references('id')->on('inventory_requisitions')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('inventory_item_status_id')->references('id')->on('inventory_item_statuses')->onDelete('cascade');
            $table->foreign('inventory_item_pattern_id')->references('id')->on('inventory_item_patterns')->onDelete('cascade');
        });

    }


    public function down(){

        Schema::dropIfExists('inventory_requisition_items');

    }
}
