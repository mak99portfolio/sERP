<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBeforeReturnSalesOrderItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('before_return_sales_order_items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sales_order_id');
            $table->integer('product_id');
            $table->double('unit_price');
            $table->integer('quantity');
            $table->integer('bonus_quantity');
            $table->integer('total_quantity');
            $table->double('net_price');
            $table->double('discount')->nullable();
            $table->softDeletes();
            $table->timestamps();
            
            $table->foreign('sales_order_id')->references('id')->on('sales_orders')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('before_return_sales_order_items');
    }
}
