<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCnfsTable extends Migration
{

    public function up()
    {
        Schema::create('cnfs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cnf_no');
            $table->integer('bill_of_lading_issue_id')->unsigned();
            $table->foreign('bill_of_lading_issue_id')->references('id')->on('bill_of_ladings')->onDelete('cascade');
            // $table->integer('commercial_invoice_id')->unsigned();
            // $table->foreign('commercial_invoice_id')->references('id')->on('commercial_invoices')->onDelete('cascade');
            $table->string('consignee');
            $table->string('bill_of_lading_issue_no');
            $table->string('bill_of_lading_issue_date');
            $table->string('bill_no');
            $table->string('bill_date');
            $table->string('bill_of_entry_no');
            $table->string('bill_of_entry_date');
            $table->string('arrival_date');
            $table->string('delivery_date');
            $table->string('job_no');
            $table->double('cnf_value');
            $table->double('usd_amount');
            $table->integer('exchange_rate');
            $table->double('bdt_amount');
            $table->integer('total_day');
            $table->string('duty_payment_date');
            // $table->double('previous_due_amount');
            // $table->double('cash_recieved_amount');
            // $table->integer('consignment_particular_id')->unsigned();
            // $table->foreign('consignment_particular_id')->references('id')->on('consignment_particulars')->onDelete('cascade');
            $table->integer('vendor_id')->unsigned();
            $table->foreign('vendor_id')->references('id')->on('vendors')->onDelete('cascade');
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
        Schema::dropIfExists('cnfs');
    }
}
