<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesOrderReturnItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales_order_return_items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sales_order_return_id');
            $table->foreign('sales_order_return_id')->references('id')->on('sales_order_returns')->onDelete('cascade');
            $table->integer('product_id');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->double('unit_price');
            $table->integer('quantity');
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
        Schema::dropIfExists('sales_order_return_items');
    }
}
