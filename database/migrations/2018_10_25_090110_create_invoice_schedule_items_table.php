<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoiceScheduleItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice_schedule_items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('invoice_schedule_id')->unsigned();
            $table->foreign('invoice_schedule_id')->references('id')->on('invoice_schedules')->onDelete('cascade');
            $table->string('payment_date');
            $table->double('payment_amount', 8, 2);
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
        Schema::dropIfExists('invoice_schedule_items');
    }
}
