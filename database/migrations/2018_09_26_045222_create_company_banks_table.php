<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyBanksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_banks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('account_no');
            $table->string('account_name');
            $table->integer('bank_id');
            $table->foreign('bank_id')->references('id')->on('banks')->onDelete('cascade');
            $table->string('branch_name');
            $table->string('swift_code')->nullable();
            $table->text('address')->nullable();
            $table->integer('creator_user_id')->unsigned();
            $table->foreign('creator_user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('updator_user_id')->unsigned()->nullable();
            $table->foreign('updator_user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('company_banks');
    }
}
