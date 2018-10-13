<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchaseOrderItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_order_items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('quantity');
            $table->integer('foreign_requisition_id')->unsigned();
            $table->foreign('foreign_requisition_id')->references('id')->on('foreign_requisitions')->onDelete('cascade');
            $table->integer('purchase_order_id')->unsigned();
            $table->foreign('purchase_order_id')->references('id')->on('purchase_orders')->onDelete('cascade');
            $table->integer('product_id')->unsigned();
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
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
        Schema::dropIfExists('purchase_order_items');
    }
}
