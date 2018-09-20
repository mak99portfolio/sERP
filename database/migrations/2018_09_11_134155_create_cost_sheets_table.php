<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCostSheetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cost_sheets', function (Blueprint $table) {
            $table->increments('id');
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

        Schema::create('cost_sheet_particulars', function (Blueprint $table) {
            $table->increments('id');
            $table->double('percent_of_lc_margin');
            $table->double('amount_of_lc_margin');
            $table->double('round_amount_of_lc_margin');
            $table->double('percent_of_lc_commision');
            $table->double('amount_of_lc_commision');
            $table->double('round_amount_of_lc_commision');
            $table->double('percent_of_vat');
            $table->double('amount_of_vat');
            $table->double('round_amount_of_vat');
            $table->double('percent_of_swift');
            $table->double('amount_of_swift');
            $table->double('round_amount_of_swift');
            $table->double('percent_of_stamp_charge');
            $table->double('amount_of_stamp_charge');
            $table->double('round_amount_of_stamp_charge');
            $table->double('percent_of_stamp_charge');
            $table->double('amount_of_stamp_charge');
            $table->double('round_amount_of_stamp_charge');
            $table->double('percent_of_lcaf_issue_charge');
            $table->double('amount_of_lcaf_issue_charge');
            $table->double('round_amount_of_lcaf_issue_charge');
            $table->double('percent_of_imp');
            $table->double('amount_of_imp');
            $table->double('round_amount_of_imp');
            $table->double('percent_of_lc_application_form');
            $table->double('amount_of_lc_application_form');
            $table->double('round_amount_of_lc_application_form');
            $table->double('percent_of_others')->nullable();
            $table->double('amount_of_others')->nullable();
            $table->double('round_amount_of_others')->nullable();
            $table->integer('cost_sheet_id')->unsigned();
            $table->foreign('cost_sheet_id')->references('id')->on('cost_sheets')->onDelete('cascade');
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
        Schema::dropIfExists('cost_sheets');
    }
}
