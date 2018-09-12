<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReceiveInternalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receive_internals', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('receive_id')->unsigned();
            $table->foreign('receive_id')->references('id')->on('receives')->onDelete('cascade');
            $table->integer('requisition_id')->unsigned();
            $table->foreign('requisition_id')->references('id')->on('requisitions')->onDelete('cascade');
            $table->integer('issue_id')->unsigned();
            $table->foreign('issue_id')->references('id')->on('issues')->onDelete('cascade');
            $table->integer('challan_id')->unsigned();
            $table->foreign('challan_id')->references('id')->on('challans')->onDelete('cascade');
            $table->integer('receive_from')->unsigned();
            $table->foreign('receive_from')->references('id')->on('working_units')->onDelete('cascade');
            $table->boolean('has_pattern');
            $table->text('remarks');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('receive_internals');
    }
}
