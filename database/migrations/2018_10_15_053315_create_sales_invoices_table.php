<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesInvoicesTable extends Migration
{
    public function up()
    {
        Schema::create('sales_invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->date('sales_invoice_date')->nullable();
            $table->integer('sales_challan_id')->unsigned();
            $table->foreign('sales_challan_id')->references('id')->on('sales_challans')->onDelete('cascade');
            // $table->integer('gate_pass_id')->unsigned();
            // $table->foreign('gate_pass_id')->references('id')->on('gate_passes')->onDelete('cascade');
            $table->integer('sales_invoice_delivery_person_id')->unsigned();
            $table->foreign('sales_invoice_delivery_person_id')->references('id')->on('employee_profiles')->onDelete('cascade');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('sales_invoices');
    }
}
