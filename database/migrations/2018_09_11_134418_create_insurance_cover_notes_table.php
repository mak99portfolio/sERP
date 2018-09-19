<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInsuranceCoverNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('insurance_cover_notes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('letter_of_credit_id')->unsigned();
            $table->foreign('letter_of_credit_id')->references('id')->on('letter_of_credits')->onDelete('cascade');
            $table->string('insurance_cover_note_no');
            $table->string('insurance_cover_note_date');
            $table->integer('vendor_id')->unsigned();
            $table->foreign('vendor_id')->references('id')->on('vendors')->onDelete('cascade');
            $table->string('icn_bank_account_no');
            $table->string('icn_bank_account_name');
            $table->string('icn_bank_name');
            $table->string('icn_bank_address');
            $table->string('consignee_bank_account_no');
            $table->string('consignee_bank_account_name');
            $table->string('consignee_bank_name');
            $table->string('consignee_bank_address');
            $table->text('note')->nullable();
            $table->double('percent_of_marine');
            $table->double('amount_of_marine');
            $table->double('percent_of_war');
            $table->double('amount_of_war');
            $table->double('percent_of_net_premium');
            $table->double('amount_of_net_premium');
            $table->double('percent_of_vat');
            $table->double('amount_of_vat');
            $table->double('percent_of_stamp_duty');
            $table->double('amount_of_stamp_duty');
            $table->double('amount_of_grand_total');
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

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('insurance_cover_notes');
    }
}
