<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesInvoicesTable extends Migration{

    public function up(){

        Schema::create('sales_invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sales_invoice_no')->unique();
            $table->integer('sales_challan_id')->unsigned();
            $table->enum('sales_invoice_status', ['pending', 'in_transit', 'delivered', 'cancelled'])->nullable();
            $table->date('sales_invoice_date')->nullable();
            $table->integer('invoice_address_id')->unsigned();
            $table->integer('shipping_address_id')->unsigned();
            $table->integer('delivery_person_id')->unsigned();
            $table->softDeletes();
            $table->timestamps();
            
            $table->foreign('delivery_person_id')->references('id')->on('employee_profiles')->onDelete('cascade');
            $table->foreign('sales_challan_id')->references('id')->on('sales_challans')->onDelete('cascade');
        });
    }

    public function down(){

        Schema::dropIfExists('sales_invoices');

    }
}
