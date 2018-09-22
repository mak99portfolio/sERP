<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInventoryReceiveLocalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventory_receive_locals', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('commercial_invoice_id')->unsigned();
            $table->foreign('commercial_invoice_id')->references('id')->on('commercial_invoices')->onDelete('cascade');
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
        Schema::dropIfExists('inventory_receive_locals');
    }
}
