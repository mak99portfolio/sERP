<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchaseOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_orders', function (Blueprint $table) {
            $table->increments('id');
            $table->text('requisition_no');
            $table->string('purchase_order_no');
            $table->integer('vendor_id');
            $table->string('requisition_date');
            $table->string('purchase_order_date');
            $table->integer('port_of_loading_port_id');
            $table->integer('port_of_discharge_port_id');
            $table->integer('country_of_final_destination_countru_id');
            $table->integer('final_destination_countru_id');
            $table->integer('country_of_origin_of_goods_countru_id');
            $table->integer('payment_type');
            $table->integer('pre_carriage_by');
            $table->text('subject');
            $table->text('letter_header');
            $table->text('letter_footer');
            $table->text('notes');
            $table->increments('id');
            $table->increments('id');
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
        Schema::dropIfExists('purchase_orders');
    }
}
