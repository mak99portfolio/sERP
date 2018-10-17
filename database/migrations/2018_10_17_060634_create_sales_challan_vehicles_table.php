<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesChallanVehiclesTable extends Migration{

    public function up(){

        Schema::create('sales_challan_vehicles', function (Blueprint $table){

            $table->increments('id');
            $table->integer('sales_challan_id')->unsigned();
            $table->enum('delivary_medium', ['own_vehicle', 'transport_agency', 'customer', 'others'])->nullable();
            $table->integer('own_vehicle_id')->unsigned()->nullable();
            $table->integer('transport_agency_id')->unsigned()->nullable();
            $table->integer('customer_id')->unsigned()->nullable();
            $table->string('vehicle_no')->nullable();
            $table->string('driver_name')->nullable();
            $table->string('phone_no')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('sales_challan_id')->references('id')->on('sales_challans')->onDelete('cascade');
            $table->foreign('own_vehicle_id')->references('id')->on('own_vehicles')->onDelete('cascade');
            $table->foreign('transport_agency_id')->references('id')->on('vendors')->onDelete('cascade');
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');

        });

    }


    public function down(){

        Schema::dropIfExists('sales_challan_own_vehicles');

    }
}
