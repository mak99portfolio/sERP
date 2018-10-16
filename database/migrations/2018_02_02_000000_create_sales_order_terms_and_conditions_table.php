<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesOrderTermsAndConditionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales_order_terms_and_conditions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('salse_order_id');
            $table->foreign('salse_order_id')->references('id')->on('sales_orders')->onDelete('cascade');
            $table->integer('terms_and_condition_id');
            $table->foreign('terms_and_condition_id')->references('id')->on('terms_and_condition_types')->onDelete('cascade');
            $table->text('description');
            $table->softDeletes();
            $table->timestamps();;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sales_order_terms_and_conditions');
    }
}
