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
            $table->string('requisition_no')->nullable();
            $table->string('purchase_order_date')->nullable();
            $table->string('proforma_invoice_no')->nullable();
            $table->string('proforma_invoice_date')->nullable();
            $table->string('proforma_invoice_receive_date')->nullable();
            $table->integer('vendor_id')->unsigned()->nullable();
            $table->foreign('vendor_id')->references('id')->on('vendors')->onDelete('restrict');
            $table->integer('port_of_loading_port_id')->unsigned()->nullable();
            $table->foreign('port_of_loading_port_id')->references('id')->on('ports')->onDelete('restrict');
            $table->integer('port_of_discharge_port_id')->unsigned()->nullable();
            $table->foreign('port_of_discharge_port_id')->references('id')->on('ports')->onDelete('restrict');
            $table->integer('country_of_final_destination_countru_id')->unsigned()->nullable();
            $table->foreign('country_of_final_destination_countru_id')->references('id')->on('countries')->onDelete('restrict');
            $table->integer('final_destination_countru_id')->unsigned()->nullable();
            $table->foreign('final_destination_countru_id')->references('id')->on('countries')->onDelete('restrict');
            $table->integer('country_of_origin_of_goods_countru_id')->unsigned()->nullable();
            $table->foreign('country_of_origin_of_goods_countru_id')->references('id')->on('countries')->onDelete('restrict');
            $table->integer('shipment_allow')->nullable();
            $table->integer('payment_type')->nullable();
            $table->integer('pre_carriage_by')->nullable();
            $table->string('customer_code')->nullable();
            $table->string('consignee')->nullable();
            $table->string('beneficiary_bank_info')->nullable();
            $table->text('notes')->nullable();
            $table->integer('company_id')->unsigned()->nullable();
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('restrict');
            $table->integer('creator_user_id')->unsigned()->nullable();
            $table->foreign('creator_user_id')->references('id')->on('users')->onDelete('restrict');
            $table->integer('updator_user_id')->unsigned()->nullable();
            $table->foreign('updator_user_id')->references('id')->on('users')->onDelete('restrict');
            $table->tinyInteger('status')->nullable();
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
