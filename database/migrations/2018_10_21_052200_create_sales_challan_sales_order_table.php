<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesChallanSalesOrderTable extends Migration{

    public function up(){

        Schema::create('sales_challan_sales_order', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sales_challan_id')->unsigned();
            $table->integer('sales_order_id')->unsigned();
            $table->timestamps();

            $table->foreign('sales_challan_id')->references('id')->on('sales_challans')->onDelete('cascade');
            $table->foreign('sales_order_id')->references('id')->on('sales_orders')->onDelete('cascade');
        });

    }

    public function down(){

        Schema::dropIfExists('sales_challan_sales_order');

    }
}
