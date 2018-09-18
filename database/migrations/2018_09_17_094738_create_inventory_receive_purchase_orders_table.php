<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInventoryReceivePurchaseOrdersTable extends Migration{

    public function up(){

        Schema::create('inventory_receive_purchase_orders', function (Blueprint $table){

            $table->increments('id');
            $table->integer('inventory_receive_id')->unsigned();
            $table->integer('commercial_invoice_id')->unsigned();
            $table->integer('receive_from')->unsigned();//in this case vendor
            $table->integer('inventory_item_status_id')->unsigned();
            $table->integer('working_unit_id')->unsigned();
            $table->text('remarks')->nullable();
            $table->integer('creator_user_id')->unsigned()->nullbale();
            $table->integer('updator_user_id')->unsigned()->nullbale();
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('inventory_receive_id')->references('id')->on('inventory_receives')->onDelete('cascade');
            $table->foreign('commercial_invoice_id')->references('id')->on('commercial_invoices')->onDelete('cascade');
            $table->foreign('receive_from')->references('id')->on('vendors')->onDelete('cascade');
            $table->foreign('inventory_item_status_id')->references('id')->on('inventory_item_statuses')->onDelete('cascade');
            $table->foreign('working_unit_id')->references('id')->on('working_units')->onDelete('cascade');
            $table->foreign('creator_user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('updator_user_id')->references('id')->on('users')->onDelete('cascade');

        });

    }

    public function down(){

        Schema::dropIfExists('inventory_receive_purchase_orders');

    }
}
