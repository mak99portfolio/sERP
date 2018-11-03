<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesOrderReturnsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales_order_returns', function (Blueprint $table) {
            $table->increments('id');
            $table->date('sales_order_return_date');
            $table->integer('sales_order_id');
            $table->foreign('sales_order_id')->references('id')->on('sales_orders')->onDelete('cascade');
            $table->integer('seals_return_reason_id');
            $table->foreign('seals_return_reason_id')->references('id')->on('sales_return_reasons')->onDelete('cascade');
            $table->integer('employee_id');
            $table->foreign('employee_id')->references('id')->on('employee_profiles')->onDelete('cascade');
            $table->integer('creator_user_id')->unsigned();
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
        Schema::dropIfExists('sales_order_returns');
    }
}
