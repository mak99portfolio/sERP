<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesOrderCancelsTable extends Migration
{
    public function up()
    {
        Schema::create('sales_order_cancels', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sales_order_cancel_no');
            $table->text('remarks')->nullable();
            $table->integer('sales_order_id')->unsigned();
            $table->foreign('sales_order_id')->references('id')->on('sales_orders')->onDelete('cascade');
            $table->integer('sales_order_cancel_reason_id')->unsigned();
            $table->foreign('sales_order_cancel_reason_id')->references('id')->on('sales_order_cancel_reasons')->onDelete('cascade');
            $table->integer('company_id')->unsigned();
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            $table->integer('creator_user_id')->unsigned()->nullable();
            $table->foreign('creator_user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('updator_user_id')->unsigned()->nullable();
            $table->foreign('updator_user_id')->references('id')->on('users')->onDelete('cascade');
            $table->tinyInteger('status')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('sales_order_cancels');
    }
}
