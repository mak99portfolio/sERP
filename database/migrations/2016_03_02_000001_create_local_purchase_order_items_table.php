<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocalPurchaseOrderItemsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('local_purchase_order_items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id')->unsigned();
            $table->integer('quantity')->unsigned();
            $table->double('unit_price', 8, 2)->nullable();
            $table->double('discount_rate', 8, 2)->nullable();
            $table->double('discount', 8, 2)->nullable();
            $table->double('vat_rate', 8, 2)->nullable();
            $table->double('total_discount', 8, 2)->nullable();
            $table->double('total_vat', 8, 2)->nullable();
            $table->integer('local_purchase_order_id')->unsigned();
            $table->foreign('local_purchase_order_id', 'lpo_foreign_id')->references('id')->on('local_purchase_orders')->onDelete('cascade');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('local_purchase_order_items');
    }

}
