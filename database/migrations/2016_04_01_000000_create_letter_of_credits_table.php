<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLetterOfCreditsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('letter_of_credits', function (Blueprint $table) {
            $table->increments('id');
            $table->string('letter_of_credit_no');
            $table->string('letter_of_credit_date')->nullable();
            $table->string('letter_of_credit_value')->nullable();
            $table->integer('vendor_id')->unsigned();
            $table->foreign('vendor_id')->references('id')->on('vendors')->onDelete('cascade');
            $table->string('letter_of_credit_expire_date')->nullable();
            $table->integer('letter_of_credit_status')->nullable();
            $table->string('letter_of_credit_shipment_date')->nullable();
            $table->integer('currency')->nullable();
            $table->string('beneficiary_ac_no')->nullable();
            $table->string('beneficiary_ac_name')->nullable();
            $table->string('beneficiary_branch_name')->nullable();
            $table->string('beneficiary_bank_name')->nullable();
            $table->string('issue_ac_no')->nullable();
            $table->string('issue_ac_name')->nullable();
            $table->string('issue_branch_name')->nullable();
            $table->string('issue_bank_name')->nullable();
            $table->integer('partial_shipment')->nullable();
            $table->integer('transhipment_information')->nullable();
            $table->integer('company_id')->unsigned()->nullable();
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            $table->integer('creator_user_id')->unsigned()->nullable();
            $table->foreign('creator_user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('updator_user_id')->unsigned()->nullable();
            $table->foreign('updator_user_id')->references('id')->on('users')->onDelete('cascade');
            $table->tinyInteger('status')->nullable();
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
        Schema::dropIfExists('letter_of_credits');
    }
}
