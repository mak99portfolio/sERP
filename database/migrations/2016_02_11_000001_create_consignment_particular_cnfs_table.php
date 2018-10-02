<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConsignmentParticularCnfsTable extends Migration
{
    public function up()
    {
        Schema::create('consignment_particular_cnfs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cnf_id')->unsigned();
            $table->foreign('cnf_id')->references('id')->on('cnfs')->onDelete('cascade');
            $table->integer('consignment_particular_id')->unsigned();
            $table->foreign('consignment_particular_id')->references('id')->on('consignment_particulars')->onDelete('cascade');
            $table->double('amount');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('consignment_particular_cnfs');
    }
}
