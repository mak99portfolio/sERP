<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCollectionScheduleItemsTable extends Migration
{
  
    public function up()
    {
        Schema::create('collection_schedule_items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('collection_schedule_id')->unsigned();
            $table->foreign('collection_schedule_id')->references('id')->on('collection_schedules')->onDelete('cascade');
            $table->string('payment_date');
            $table->double('payment_amount', 8, 2);
            $table->integer('invoice_id')->unsigned();
            $table->foreign('invoice_id')->references('id')->on('sales_invoices')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('collection_schedule_items');
    }
}
