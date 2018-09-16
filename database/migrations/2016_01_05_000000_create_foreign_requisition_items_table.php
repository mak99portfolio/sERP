<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForeignRequisitionItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('foreign_requisition_items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('foreign_requisition_id')->unsigned();
            $table->foreign('foreign_requisition_id')->references('id')->on('foreign_requisitions')->onDelete('restrict');
            $table->integer('product_id')->unsigned();
            $table->foreign('product_id')->references('id')->on('products')->onDelete('restrict');
            $table->integer('total_quantity');
            $table->integer('requisition_quantity');
            $table->integer('physical_stock');
            $table->integer('goods_in_transit');
            $table->integer('pending');
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
        Schema::dropIfExists('foreign_requisition_items');
    }
}
