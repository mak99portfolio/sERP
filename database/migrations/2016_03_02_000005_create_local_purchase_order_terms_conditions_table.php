<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocalPurchaseOrderTermsConditionsTable extends Migration {


    public function up() {
        Schema::create('local_purchase_order_terms_conditions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('terms_type');
            $table->text('description')->nullable();
            $table->integer('local_purchase_order_id')->unsigned();
            $table->foreign('local_purchase_order_id', 'lpotc_foreign_id')->references('id')->on('local_purchase_orders')->onDelete('cascade');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('local_purchase_order_terms_conditions');
    }

}
