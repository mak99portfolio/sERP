<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocalPurchaseOrderLocalRequisitionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('local_purchase_order_local_requisitions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('local_requisition_id')->unsigned();
            $table->foreign('local_requisition_id', 'lr_id_foreign')->references('id')->on('local_requisitions')->onDelete('cascade');
            $table->integer('local_purchase_order_id')->unsigned();
            $table->foreign('local_purchase_order_id', 'lpo_id_foreign')->references('id')->on('local_purchase_orders')->onDelete('cascade');
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
        Schema::dropIfExists('local_purchase_order_local_requisitions');
    }
}
