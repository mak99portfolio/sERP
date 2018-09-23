<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInventoryReceiveLocalsTable extends Migration{

    public function up(){

        Schema::create('inventory_receive_locals', function (Blueprint $table){

            $table->increments('id');
            $table->integer('inventory_receive_id')->unsigned();
            $table->integer('local_purchase_order_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            
            $table->foreign('inventory_receive_id')->references('id')->on('inventory_receives')->onDelete('cascade');
            $table->foreign('local_purchase_order_id')->references('id')->on('local_purchase_orders')->onDelete('cascade');

        });

    }


    public function down(){

        Schema::dropIfExists('inventory_receive_locals');
        
    }

}
