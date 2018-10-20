<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInventoryReceiveReturnsTable extends Migration{

    public function up(){

        Schema::create('inventory_receive_returns', function (Blueprint $table){

            $table->increments('id');
            $table->integer('inventory_receive_id')->unsigned();
            $table->integer('inventory_issue_id')->unique()->unsigned();
            $table->integer('inventory_return_reason_id')->unsigned();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('inventory_receive_id')->references('id')->on('inventory_receives')->onDelete('cascade');
            $table->foreign('inventory_issue_id')->references('id')->on('inventory_issues')->onDelete('cascade');
            $table->foreign('inventory_return_reason_id')
            ->references('id')->on('inventory_return_reasons')->onDelete('cascade');

        });
    }

    public function down(){

        Schema::dropIfExists('inventory_receive_returns');
        
    }

}
