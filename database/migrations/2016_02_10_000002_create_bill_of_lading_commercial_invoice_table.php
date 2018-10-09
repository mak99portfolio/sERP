<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBillOfLadingCommercialInvoiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bill_of_lading_commercial_invoice', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('bill_of_lading_id')->unsigned();
            $table->foreign('bill_of_lading_id')->references('id')->on('bill_of_ladings')->onDelete('cascade');
            $table->integer('commercial_invoice_id')->unsigned();
            $table->foreign('commercial_invoice_id')->references('id')->on('commercial_invoices')->onDelete('cascade');
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
        Schema::dropIfExists('bill_of_lading_commercial_invoice');
    }
}
