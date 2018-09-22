<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInventoryReceiveForeignsTable extends Migration{

    public function up(){

        Schema::create('inventory_receive_foreigns', function (Blueprint $table){

            $table->increments('id');
            $table->integer('inventory_receive_id')->unsigned();
            $table->integer('commercial_invoice_id')->unsigned();
            $table->integer('product_status_id')->unsigned();
            $table->integer('product_pattern_id')->unsigned();
            $table->integer('working_unit_id')->unsigned();
            $table->text('remarks')->nullable();
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('inventory_receive_id')->references('id')->on('inventory_receives')->onDelete('cascade');
            $table->foreign('commercial_invoice_id')->references('id')->on('commercial_invoices')->onDelete('cascade');
            $table->foreign('product_status_id')->references('id')->on('product_statuses')->onDelete('cascade');
            $table->foreign('product_pattern_id')->references('id')->on('product_patterns')->onDelete('cascade');
            $table->foreign('working_unit_id')->references('id')->on('working_units')->onDelete('cascade');

        });

    }

    public function down(){

        Schema::dropIfExists('inventory_receive_foreigns');

    }
}
