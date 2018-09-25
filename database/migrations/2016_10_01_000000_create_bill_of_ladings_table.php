<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBillOfLadingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bill_of_ladings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('bill_of_lading_issue_no');
            $table->string('bill_of_lading_issue_date');
            $table->string('container_no');
            $table->string('container_size');
            $table->string('number_of_box');
            $table->integer('shipping_agency_id')->unsigned();
            $table->foreign('shipping_agency_id')->references('id')->on('vendors')->onDelete('cascade');
            // $table->string('local_agency_id');
            // $table->foreign('local_agency_id')->references('id')->on('vendors')->onDelete('cascade');
            $table->integer('exproter_id')->unsigned();
            $table->foreign('exproter_id')->references('id')->on('vendors')->onDelete('cascade');
            $table->string('consignee');
            $table->string('acceptance');
            $table->integer('port_of_loading_id')->unsigned();
            $table->foreign('port_of_loading_id')->references('id')->on('ports')->onDelete('cascade');
            $table->integer('port_of_dischare_id')->unsigned();
            $table->foreign('port_of_dischare_id')->references('id')->on('ports')->onDelete('cascade');
            $table->string('place_of_delivery');
            $table->string('voyage_no');
            $table->string('place_of_transhipment');
            $table->string('modes_of_transport');
            $table->string('move_type');
            $table->string('issue_place');
            $table->string('number_of_mtd');
            $table->softDeletes();
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
        Schema::dropIfExists('bill_of_ladings');
    }
}
