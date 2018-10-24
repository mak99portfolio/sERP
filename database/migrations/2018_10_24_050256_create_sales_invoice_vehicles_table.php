<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesInvoiceVehiclesTable extends Migration{

    public function up(){

        Schema::create('sales_invoice_vehicles', function (Blueprint $table){

            $table->increments('id');
            $table->integer('sales_invoice_id')->unsigned();
            $table->enum('delivery_medium', ['own_vehicle', 'transport_agency', 'customer', 'others'])->nullable();
            $table->integer('own_vehicle_id')->unsigned()->nullable();
            $table->integer('transport_agency_id')->unsigned()->nullable();
            // $table->integer('customer_id')->unsigned()->nullable();
            $table->string('vehicle_no')->nullable();
            $table->string('driver_name')->nullable();
            $table->string('phone_no')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('sales_invoice_id')->references('id')->on('sales_invoices')->onDelete('cascade');
            $table->foreign('own_vehicle_id')->references('id')->on('own_vehicles')->onDelete('cascade');
            $table->foreign('transport_agency_id')->references('id')->on('vendors')->onDelete('cascade');

        });

    }

    public function down(){
        Schema::dropIfExists('sales_invoice_vehicles');
    }

}
