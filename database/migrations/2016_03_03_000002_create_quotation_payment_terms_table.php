<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuotationPaymentTermsTable extends Migration
{
    public function up()
    {
        Schema::create('quotation_payment_terms', function (Blueprint $table) {
            $table->increments('id');
            $table->date('payment_date')->nullable();
            $table->text('description')->nullable();
            $table->decimal('amount', 12, 2)->nullable();
            $table->integer('quotation_id')->unsigned();
            $table->foreign('quotation_id')->references('id')->on('quotations')->onDelete('cascade');
            $table->integer('payment_type_id')->unsigned();
            $table->foreign('payment_type_id')->references('id')->on('payment_types')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('quotation_payment_terms');
    }
}
