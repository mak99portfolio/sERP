<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCostSheetParticularsTable extends Migration
{

    public function up()
    {
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

    public function down()
    {
        Schema::dropIfExists('cost_sheet_particulars');
    }
}
