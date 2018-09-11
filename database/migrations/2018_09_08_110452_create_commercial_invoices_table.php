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
            $table->string('number');
            $table->string('date');
            $table->integer('po_id');
            $table->integer('lc_id');
            $table->integer('proforma_invoice_id');
            $table->foreign('proforma_invoice_id')->references('id')->on('proforma_invoices')->onDelete('restrict');
            $table->text('description');
            $table->string('other_reference_no');
            $table->integer('exporter_id');
            $table->foreign('exporter_id')->references('id')->on('exporters')->onDelete('restrict');
            $table->string('bill_of_lading_no');
            $table->string('bill_of_lading_date');
            $table->string('vessel');
            $table->string('place_receipt_pre_carrier');
            $table->integer('local_bank_id');
            $table->foreign('local_bank_id')->references('id')->on('banks')->onDelete('restrict');
            $table->integer('foreign_bank_id');
            $table->foreign('foreign_bank_id')->references('id')->on('banks')->onDelete('restrict');
            $table->integer('country_goods_country_id');
            $table->foreign('country_goods_country_id')->references('id')->on('countries')->onDelete('restrict');
            $table->integer('destination_country_id');
            $table->foreign('destination_country_id')->references('id')->on('countries')->onDelete('restrict');
            $table->integer('port_of_loading_port_id');
            $table->foreign('port_of_loading_port_id')->references('id')->on('ports')->onDelete('restrict');
            $table->integer('port_of_discharge_port_id');
            $table->foreign('port_of_discharge_port_id')->references('id')->on('ports')->onDelete('restrict');
            $table->integer('destination_city_id')->unsigned();
            $table->foreign('destination_city_id')->references('id')->on('cities')->onDelete('restrict');
            $table->string('export_reference');
            $table->double('exchange_rate');
            $table->string('customer_code');
            $table->string('terms_of_delivery');
            $table->string('terms_of_payment');
            $table->string('consignee');
            $table->integer('agreed_by_user_id')->unsigned();
            $table->foreign('agreed_by_user_id')->references('id')->on('users')->onDelete('restrict');
            $table->integer('approved_by_user_id')->unsigned();
            $table->foreign('approved_by_user_id')->references('id')->on('users')->onDelete('restrict');
            $table->string('container_no');
            $table->string('kind_of_package');
            $table->double('freight');
            $table->double('grand_total');
            $table->double('sub_total_amount');
            $table->integer('sub_total_quantity');
            $table->integer('creator_user_id')->unsigned();
            $table->foreign('creator_user_id')->references('id')->on('users')->onDelete('restrict');
            $table->integer('updator_user_id')->unsigned();
            $table->foreign('updator_user_id')->references('id')->on('users')->onDelete('restrict');
            $table->integer('company_id')->unsigned();
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('restrict');
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
        Schema::dropIfExists('commercial_invoices');
    }
}
