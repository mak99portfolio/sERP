<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocalPurchaseOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('local_purchase_orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('purchase_oder_no');
            $table->string('inco_terms');
            $table->string('inco_term_info');
            $table->string('procurement_type');
            $table->string('purchase_order_type');
            $table->string('purchase_oder_date');
            $table->string('status');
            $table->string('shipping_method');
            $table->string('payment_method');
            $table->string('remarks');
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
        Schema::dropIfExists('local_purchase_orders');
    }
}
