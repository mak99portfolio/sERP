<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocalPurchaseOrderPaymentTermsTable extends Migration {

    public function up() {
        Schema::create('local_purchase_order_payment_terms', function (Blueprint $table) {
            $table->increments('id');
            $table->string('payment_type')->nullable();
            $table->date('payment_date')->nullable();
            $table->text('description')->nullable();
            $table->decimal('amount', 12, 2)->nullable();
            $table->integer('local_purchase_order_id')->unsigned();
            $table->foreign('local_purchase_order_id', 'lpopt_foreign_id')->references('id')->on('local_purchase_orders')->onDelete('cascade');
            $table->integer('creator_user_id')->unsigned()->nullable();
            $table->foreign('creator_user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('updator_user_id')->unsigned()->nullable();
            $table->foreign('updator_user_id')->references('id')->on('users')->onDelete('cascade');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('local_purchase_order_payment_terms');
    }

}
