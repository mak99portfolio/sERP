<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLetterOfCreditApplicationNumbersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('letter_of_credit_application_numbers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('lca_no');
            $table->integer('letter_of_credit_id')->unsigned()->nullable();
            $table->foreign('letter_of_credit_id', 'lcan_foreign_id')->references('id')->on('letter_of_credits')->onDelete('cascade');
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
        Schema::dropIfExists('letter_of_credit_application_numbers');
    }
}
