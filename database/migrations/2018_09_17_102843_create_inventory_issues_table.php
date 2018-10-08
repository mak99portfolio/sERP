<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInventoryIssuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){

        Schema::create('inventory_issues', function(Blueprint $table){

            $table->increments('id');
            $table->string('inventory_issue_no')->unique();
            $table->integer('inventory_requisition_id')->unsigned()->nullable();
            $table->integer('initial_approver_id')->unsigned()->nullable();
            $table->integer('final_approver_id')->unsigned()->nullable();
            $table->integer('inventory_issue_status_id')->unsigned()->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('inventory_requisition_id')->references('id')->on('inventory_requisitions')->onDelete('cascade');
            $table->foreign('initial_approver_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('final_approver_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('inventory_issue_status_id')->references('id')->on('inventory_issue_statuses')->onDelete('cascade');

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inventory_issues');
    }
}
