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
            $table->text('requisition_no')->nullable();
            $table->string('purchase_order_no')->nullable();
            $table->integer('vendor_id')->unsigned();
            $table->foreign('vendor_id')->references('id')->on('vendors')->onDelete('cascade');
            $table->string('requisition_date')->nullable();
            $table->string('purchase_order_date')->nullable();
            $table->integer('port_of_loading_port_id')->unsigned()->nullable();
            $table->foreign('port_of_loading_port_id')->references('id')->on('ports')->onDelete('cascade');
            $table->integer('port_of_discharge_port_id')->unsigned()->nullable();
            $table->foreign('port_of_discharge_port_id')->references('id')->on('ports')->onDelete('cascade');
            $table->integer('country_of_final_destination_country_id')->unsigned()->nullable();
            $table->foreign('country_of_final_destination_country_id')->references('id')->on('countries')->onDelete('cascade');
            $table->integer('final_destination_country_id')->unsigned()->nullable();
            $table->foreign('final_destination_country_id')->references('id')->on('countries')->onDelete('cascade');
            $table->integer('country_of_origin_of_goods_country_id')->unsigned()->nullable();
            $table->foreign('country_of_origin_of_goods_country_id')->references('id')->on('countries')->onDelete('cascade');
            $table->integer('payment_type')->nullable();
            $table->integer('pre_carriage_by')->nullable();
            $table->text('subject')->nullable();
            $table->text('letter_header')->nullable();
            $table->text('letter_footer')->nullable();
            $table->text('notes')->nullable();
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
        Schema::dropIfExists('purchase_orders');
    }
}
