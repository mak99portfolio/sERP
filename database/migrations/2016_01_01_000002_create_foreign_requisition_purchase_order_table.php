<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForeignRequisitionPurchaseOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('foreign_requisition_purchase_order', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('purchase_order_id')->unsigned()->nullable();
            $table->foreign('purchase_order_id', 'po_foreign_id')->references('id')->on('purchase_orders')->onDelete('cascade');
            $table->integer('foreign_requisition_id')->unsigned()->nullable();
            $table->foreign('foreign_requisition_id', 'fr_foreign_id')->references('id')->on('foreign_requisitions')->onDelete('cascade');
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
        Schema::dropIfExists('foreign_requisition_purchase_order');
    }
}
