<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeliveryScheduleItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('delivery_schedule_items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('delivery_schedule_id')->unsigned();
            $table->foreign('delivery_schedule_id')->references('id')->on('delivery_schedules')->onDelete('cascade');
            $table->integer('product_id')->unsigned();
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->integer('total_quantity')->unsigned();
            $table->integer('delivery_quantity')->unsigned();
            $table->string('delivery_date');
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
        Schema::dropIfExists('delivery_schedule_items');
    }
}
