<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProformaInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proforma_invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->string('proforma_invoice_no');
            $table->string('proforma_invoice_date');
            $table->integer('purchase_order_id');
            $table->foreign('purchase_order_id')->references('id')->on('purchase_orders')->onDelete('restrict');
            $table->integer('exporter_id');
            $table->foreign('exporter_id')->references('id')->on('exporters')->onDelete('restrict');
            $table->string('pi_received_date');
            $table->string('pre_carriage_by');
            $table->string('place_receipt_by');
            $table->integer('port_of_loading_port_id');
            $table->foreign('port_of_loading_port_id')->references('id')->on('ports')->onDelete('restrict');
            $table->integer('port_of_discharge_port_id');
            $table->foreign('port_of_discharge_port_id')->references('id')->on('ports')->onDelete('restrict');
            $table->integer('final_destination_country_id');
            $table->foreign('final_destination_country_id')->references('id')->on('countries')->onDelete('restrict');
            $table->string('other_reference');
            $table->integer('country_origin_goods_country_id');
            $table->foreign('country_origin_goods_country_id')->references('id')->on('countries')->onDelete('restrict');
            $table->integer('country_final_dest_country_id');
            $table->foreign('country_final_dest_country_id')->references('id')->on('countries')->onDelete('restrict');
            $table->string('terms_of_delivery');
            $table->string('terms_of_payment');
            $table->string('customer_code');
            $table->integer('consignee_company_id');
            $table->foreign('consignee_company_id')->references('id')->on('companies')->onDelete('restrict');
            $table->integer('agreed_by_company_id');
            $table->foreign('agreed_by_company_id')->references('id')->on('companies')->onDelete('restrict');
            $table->integer('approved_by_user_id');
            $table->foreign('approved_by_user_id')->references('id')->on('users')->onDelete('restrict');
            $table->integer('beneficiary_bank_id');
            $table->foreign('beneficiary_bank_id')->references('id')->on('banks')->onDelete('restrict');
            $table->integer('negotiatory_bank_id');
            $table->foreign('negotiatory_bank_id')->references('id')->on('banks')->onDelete('restrict');
            $table->text('attachment');
            $table->double('subtotal');
            $table->double('add_freight');
            $table->double('grand_total');
            $table->text('notes');
            $table->integer('requisition_id');
            $table->foreign('requisition_id')->references('id')->on('requisitions')->onDelete('restrict');
            $table->integer('total_quantity');
            $table->double('total_amount');
            $table->double('total_discount');
            $table->string('lc_opening_expected_date');
            $table->integer('company_id')->unsigned();
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('restrict');
            $table->integer('creator_user_id')->unsigned();
            $table->foreign('creator_user_id')->references('id')->on('users')->onDelete('restrict');
            $table->integer('updator_user_id')->unsigned();
            $table->foreign('updator_user_id')->references('id')->on('users')->onDelete('restrict');
            $table->tinyInteger('status');
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
        Schema::dropIfExists('proforma_invoices');
    }
}
