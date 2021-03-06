<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesInvoicesTable extends Migration{

    public function up(){

        Schema::create('sales_invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sales_invoice_no')->unique();
            $table->integer('customer_id')->unsigned();
            $table->integer('sales_challan_id')->unsigned();
            $table->enum('sales_invoice_status', ['pending', 'in_transit', 'delivered', 'cancelled'])->nullable();
            $table->date('sales_invoice_date')->nullable();
            $table->integer('invoice_address_id')->unsigned();
            $table->integer('gate_pass_id')->unsigned();
            $table->integer('shipping_address_id')->unsigned();
            $table->integer('delivery_person_id')->unsigned();
            $table->integer('total_quantity')->unsigned()->default(0);
            $table->decimal('total_amount', 12, 2)->default(0.00);
            $table->decimal('total_vat', 12, 2)->default(0.00);
            $table->decimal('total_discount', 12, 2)->default(0.00);
            $table->decimal('extra_discount', 12, 2)->unsigned()->default(0);
            $table->decimal('grand_total', 12, 2)->default(0.00);
            $table->decimal('invoiced_amount', 12, 2)->default(0.00);
            $table->integer('creator_user_id')->unsigned()->nullable();
            $table->integer('updator_user_id')->unsigned()->nullable();
            $table->softDeletes();
            $table->timestamps();
            
            $table->foreign('delivery_person_id')->references('id')->on('employee_profiles')->onDelete('cascade');
            $table->foreign('sales_challan_id')->references('id')->on('sales_challans')->onDelete('cascade');
            $table->foreign('gate_pass_id')->references('id')->on('gate_passes')->onDelete('cascade');
            $table->foreign('creator_user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('updator_user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down(){

        Schema::dropIfExists('sales_invoices');

    }
}
