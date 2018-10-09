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
            $table->string('purchase_order_no')->unsigned()->nullable();
            $table->string('inco_terms')->nullable();
            $table->string('inco_term_info')->nullable();
            $table->string('procurement_type')->nullable();
            $table->string('purchase_order_type')->nullable();
            $table->date('purchase_order_date')->nullable();
            $table->string('status')->nullable();
            $table->string('shipping_method')->nullable();
            $table->string('payment_method')->nullable();
            $table->string('ship_info')->nullable();
            $table->string('remarks')->nullable();
            $table->integer('creator_user_id')->unsigned()->nullable();
            $table->foreign('creator_user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('updator_user_id')->unsigned()->nullable();
            $table->foreign('updator_user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('local_purchase_orders');
    }
}
