<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommercialInvoiceTrackingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commercial_invoice_trackings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('commercial_invoice_id')->unique();
            $table->foreign('commercial_invoice_id')->references('id')->on('commercial_invoices')->onDelete('cascade');
            $table->string('commercial_invoice_issue_date')->nullable();
            $table->string('bill_of_lading_issue_date')->nullable();
            $table->string('document_arrived_at_bank_date')->nullable();
            $table->string('document_send_at_port_date')->nullable();
            $table->string('document_value_payment_date')->nullable();
            $table->string('container_arrived_at_port_date')->nullable();
            $table->string('container_birth_at_port_date')->nullable();
            $table->string('container_delivery_at_port_date')->nullable();
            $table->string('receive_at_warehouse_date')->nullable();
            $table->integer('company_id')->unsigned()->nullable();
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
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
        Schema::dropIfExists('commercial_invoice_trackings');
    }
}
