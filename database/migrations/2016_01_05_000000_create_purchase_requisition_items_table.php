<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchaseRequisitionItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_requisition_items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('purchase_requisition_id')->unsigned();
            $table->foreign('purchase_requisition_id')->references('id')->on('purchase_requisitions')->onDelete('restrict');
            $table->integer('product_id')->unsigned();
            $table->foreign('product_id')->references('id')->on('products')->onDelete('restrict');
            $table->integer('product_quantity');
            $table->double('product_tax');
            $table->integer('creator_user_id')->unsigned();
            $table->foreign('creator_user_id')->references('id')->on('users')->onDelete('restrict');
            $table->integer('updator_user_id')->unsigned();
            $table->foreign('updator_user_id')->references('id')->on('users')->onDelete('restrict');
            $table->tinyInteger('status');
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
        Schema::dropIfExists('purchase_requisition_items');
    }
}
