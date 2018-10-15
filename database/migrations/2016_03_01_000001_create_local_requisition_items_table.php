<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocalRequisitionItemsTable extends Migration
{
    public function up()
    {
        Schema::create('local_requisition_items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('local_requisition_id');
            $table->foreign('local_requisition_id')->references('id')->on('local_requisitions')->onDelete('cascade');
            $table->integer('product_id')->unsigned();
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->integer('quantity')->default(0);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('local_requisition_items');
    }
}
