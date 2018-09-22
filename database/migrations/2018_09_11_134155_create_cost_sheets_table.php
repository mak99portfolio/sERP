<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCostSheetsTable extends Migration
{
    public function up()
    {
        Schema::create('cost_sheets', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cost_sheet_no');
            $table->integer('letter_of_credit_id')->unsigned();
            $table->foreign('letter_of_credit_id')->references('id')->on('letter_of_credits')->onDelete('cascade');
            $table->integer('currency')->nullable();
            $table->integer('exchange_rate');
            $table->double('bdt_amount');
            $table->text('note')->nullable();
            $table->integer('company_id')->unsigned();
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('restrict');
            $table->integer('creator_user_id')->unsigned()->nullable();
            $table->foreign('creator_user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('updator_user_id')->unsigned()->nullable()->nullable();
            $table->foreign('updator_user_id')->references('id')->on('users')->onDelete('cascade');
            $table->tinyInteger('status')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cost_sheets');
    }
}
