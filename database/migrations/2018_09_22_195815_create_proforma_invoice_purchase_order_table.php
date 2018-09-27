<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProformaInvoicePurchaseOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proforma_invoice_purchase_order', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('proforma_invoice_id')->unsigned()->nullable();
            $table->foreign('proforma_invoice_id', 'pipo_foreign_id')->references('id')->on('proforma_invoices')->onDelete('cascade');
            $table->integer('purchase_order_id')->unsigned()->nullable();
            $table->foreign('purchase_order_id', 'popi_foreign_id')->references('id')->on('purchase_orders')->onDelete('cascade');
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
        Schema::dropIfExists('proforma_invoice_purchase_order');
    }
}
