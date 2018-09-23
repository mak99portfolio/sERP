<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommercialInvoicesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('commercial_invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->string('commercial_invoice_no')->unique();
            $table->string('date');
            $table->integer('letter_of_credit_id')->unsigned();
            $table->foreign('letter_of_credit_id')->references('id')->on('letter_of_credits')->onDelete('cascade');
            $table->string('bill_no');
            $table->string('bill_date');
            $table->string('vessel_no');
            $table->string('container_no');
            $table->integer('port_of_loading_port_id');
            $table->foreign('port_of_loading_port_id')->references('id')->on('ports')->onDelete('cascade');
            $table->integer('port_of_discharge_port_id');
            $table->foreign('port_of_discharge_port_id')->references('id')->on('ports')->onDelete('cascade');
            $table->integer('destination_city_id')->unsigned();
            $table->foreign('destination_city_id')->references('id')->on('cities')->onDelete('cascade');
            $table->integer('country_goods_country_id');
            $table->foreign('country_goods_country_id')->references('id')->on('countries')->onDelete('cascade');
            $table->integer('destination_country_id');
            $table->foreign('destination_country_id')->references('id')->on('countries')->onDelete('cascade');
            $table->text('notes')->nullable();
            $table->integer('agreed_by_user_id')->unsigned()->nullable();
            $table->foreign('agreed_by_user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('approved_by_user_id')->unsigned()->nullable();
            $table->foreign('approved_by_user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('sub_total_quantity')->nullable();
            $table->double('sub_total_amount')->nullable();
            $table->double('freight')->nullable();
            $table->double('grand_total')->nullable();
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
    public function down() {
        Schema::dropIfExists('commercial_invoices');
    }

}
