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
            $table->integer('vendor_id')->unsigned();
            $table->foreign('vendor_id')->references('id')->on('vendors')->onDelete('restrict');
            $table->string('requisition_date');
            $table->string('purchase_order_date');
            $table->integer('port_of_loading_port_id')->unsigned();
            $table->foreign('port_of_loading_port_id')->references('id')->on('ports')->onDelete('restrict');
            $table->integer('port_of_discharge_port_id')->unsigned();
            $table->foreign('port_of_discharge_port_id')->references('id')->on('ports')->onDelete('restrict');
            $table->integer('country_of_final_destination_countru_id')->unsigned();
            $table->foreign('country_of_final_destination_countru_id')->references('id')->on('countries')->onDelete('restrict');
            $table->integer('final_destination_countru_id')->unsigned();
            $table->foreign('final_destination_countru_id')->references('id')->on('countries')->onDelete('restrict');
            $table->integer('country_of_origin_of_goods_countru_id')->unsigned();
            $table->foreign('country_of_origin_of_goods_countru_id')->references('id')->on('countries')->onDelete('restrict');
            $table->integer('payment_type');
            $table->integer('pre_carriage_by');
            $table->text('subject');
            $table->text('letter_header');
            $table->text('letter_footer');
            $table->text('notes');
            $table->integer('creator_user_id')->unsigned();
            $table->foreign('creator_user_id')->references('id')->on('users')->onDelete('restrict');
            $table->integer('updator_user_id')->unsigned()->nullable();
            $table->foreign('updator_user_id')->references('id')->on('users')->onDelete('restrict');
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
        Schema::dropIfExists('purchase_orders');
    }
}
