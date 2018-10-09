<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOtherLetterOfCreditChargesTable extends Migration{

    public function up(){

        Schema::create('other_letter_of_credit_charges', function (Blueprint $table){
            $table->increments('id');
            $table->integer('cost_sheet_id')->unsigned();
            $table->integer('cost_particular_id')->unsigned();
            $table->decimal('percentage', 12,2)->default(0.00);
            $table->decimal('amount', 12,2)->default(0.00);
            $table->decimal('round_figure', 12,2)->default(0.00);
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('cost_sheet_id')->references('id')->on('cost_sheets')->onDelete('cascade');
            $table->foreign('cost_particular_id')->references('id')->on('cost_particulars')->onDelete('cascade');
        });

    }


    public function down(){

        Schema::dropIfExists('other_letter_of_credit_charges');

    }
}
