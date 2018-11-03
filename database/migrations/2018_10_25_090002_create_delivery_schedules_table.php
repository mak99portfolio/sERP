<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeliverySchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('delivery_schedules', function (Blueprint $table) {
            $table->increments('id');
                $table->integer('customer_id')->unsigned();
                $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
                $table->integer('sales_order_id')->unsigned();
                $table->foreign('sales_order_id')->references('id')->on('sales_orders')->onDelete('cascade');
                $table->string('delivery_schedule_no')->nullable();
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
        Schema::dropIfExists('delivery_schedules');
    }
}
