<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesChallanBookingDistributionsTable extends Migration{

    public function up(){

        Schema::create('sales_challan_booking_distributions', function (Blueprint $table){

            $table->increments('id');
            $table->integer('sales_order_id')->unsigned()->nullable();
            $table->integer('sales_challan_id')->unsigned()->nullable();
            $table->integer('working_unit_id')->unsigned()->nullable();
            $table->integer('product_id')->unsigned()->nullable();
            $table->integer('booking_quantity')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('sales_order_id')->references('id')->on('sales_orders')->onDelete('cascade');
            $table->foreign('sales_challan_id')->references('id')->on('sales_challans')->onDelete('cascade');
            $table->foreign('working_unit_id')->references('id')->on('working_units')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });

    }

    public function down(){

        Schema::dropIfExists('sales_challan_booking_distributions');

    }
}
