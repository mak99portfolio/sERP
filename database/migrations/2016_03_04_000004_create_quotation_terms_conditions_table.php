<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuotationTermsConditionsTable extends Migration
{
    public function up()
    {
        Schema::create('quotation_terms_conditions', function (Blueprint $table) {
            $table->increments('id');
            $table->text('description')->nullable();
            $table->integer('quotation_id')->unsigned();
            $table->foreign('quotation_id')->references('id')->on('quotations')->onDelete('cascade');
            $table->integer('terms_and_condition_type_id')->unsigned();
            $table->foreign('terms_and_condition_type_id')->references('id')->on('terms_and_condition_types')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('quotation_terms_conditions');
    }
}
