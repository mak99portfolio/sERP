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
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('inventory_receive_id')->references('id')->on('inventory_receives')->onDelete('cascade');
            $table->foreign('commercial_invoice_id')->references('id')->on('commercial_invoices')->onDelete('cascade');

        });

    }

    public function down(){

        Schema::dropIfExists('inventory_receive_foreigns');

    }
}
