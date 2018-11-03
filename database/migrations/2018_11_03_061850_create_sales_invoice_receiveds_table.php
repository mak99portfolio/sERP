<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesInvoiceReceivedsTable extends Migration{

    public function up(){

        Schema::create('sales_invoice_receiveds', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('customer_id')->unsigned();
            $table->integer('sales_invoice_id')->unsigned();
            $table->decimal('sales_invoice_amount', 12, 2)->dafault(0.00);
            $table->date('sales_invoice_received_date')->nullable();
            $table->text('remarks')->nullable();
            $table->integer('creator_user_id')->unsigned()->nullable();
            $table->integer('updator_user_id')->unsigned()->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
            $table->foreign('sales_invoice_id')->references('id')->on('sales_invoices')->onDelete('cascade');
            $table->foreign('creator_user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('updator_user_id')->references('id')->on('users')->onDelete('cascade');
        });

    }

    public function down(){

        Schema::dropIfExists('sales_invoice_receiveds');

    }
}
