<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInventoryRequisitionDetailsTable extends Migration{

    public function up(){

        Schema::create('inventory_requisition_details', function (Blueprint $table){
            $table->increments('id');
            $table->integer('inventory_requisition_id')->unsigned();
            $table->integer('item_id')->unsigned();
            $table->integer('requested_quantity')->unsigned()->default(0);
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('inventory_requisition_id')->references('id')->on('inventory_requisitions')->onDelete('cascade');
            $table->foreign('item_id')->references('id')->on('products')->onDelete('cascade');
        });

    }


    public function down(){

        Schema::dropIfExists('inventory_requisition_details');

    }
}
