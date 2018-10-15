<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInventoryIssueRequestsTable extends Migration{

    public function up(){

        Schema::create('inventory_issue_requests', function (Blueprint $table){

            $table->increments('id');
            $table->integer('inventory_requisition_id')->unsigned()->nullable();
            $table->integer('sender_working_unit_id')->unsigned()->nullable();
            $table->integer('requested_working_unit_id')->unsigned()->nullable();
            $table->timestamps();
            $table->foreign('inventory_requisition_id')->references('id')->on('inventory_requisitions')->onDelete('cascade');
            $table->foreign('sender_working_unit_id')->references('id')->on('working_units')->onDelete('cascade');
            $table->foreign('requested_working_unit_id')->references('id')->on('working_units')->onDelete('cascade');
            
        });

    }


    public function down(){

        Schema::dropIfExists('inventory_issue_requests');

    }

}
