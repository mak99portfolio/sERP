<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommercialInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commercial_invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ci_no');
            $table->string('ci_date');
            $table->integer('po_id');
            $table->integer('lc_id');
            $table->integer('pi_id');
            $table->text('description');
            $table->string('ci_other_ref_no');
            $table->integer('ci_exporter_id');
            $table->string('bl_no');
            $table->string('bl_date');
            $table->string('vessel');
            $table->string('place_receipt_pre_carrier');
            $table->integer('local_bank_id');
            $table->integer('foreign_bank_id');
            $table->integer('country_goods_id');
            $table->integer('destination_country_id');
            $table->integer('port_of_loading');
            $table->integer('port_of_discharge');
            $table->integer('final_destination');
            $table->string('export_reference');
            $table->integer('currency_id');
            $table->string('customer_code');
            $table->string('terms_of_delivery');
            $table->string('terms_of_payment');
            $table->string('consignee_id');
            $table->integer('agreed_by');
            $table->integer('approved_by');
            $table->string('container_no');
            $table->string('kind_of_package');
            $table->double('freight');
            $table->double('grand_total');
            $table->integer('creator_id');
            $table->integer('create_time');
            $table->integer('updator_id');
            $table->integer('update_time');
            $table->integer('company_id');
            $table->tinyInteger('status');
            $table->double('sub_total_amount');
            $table->integer('sub_total_quantity');

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
        Schema::dropIfExists('commercial_invoices');
    }
}
