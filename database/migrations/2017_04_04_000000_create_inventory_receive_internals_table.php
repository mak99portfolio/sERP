<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInventoryReceiveInternalsTable extends Migration{

    public function up(){

        Schema::create('inventory_receive_internals', function (Blueprint $table){

            $table->increments('id');
            $table->integer('inventory_receive_id')->unsigned();
            $table->integer('inventory_issue_id')->unsigned();
            $table->string('challan_no')->nullable();
            $table->timestamps();
            $table->softDeletes();
            
            $table->foreign('inventory_receive_id')->references('id')->on('inventory_receives')->onDelete('cascade');
            $table->foreign('inventory_issue_id')->references('id')->on('inventory_issues')->onDelete('cascade');

        });

    }


    public function down(){

        Schema::dropIfExists('inventory_receive_internals');

    }
}
