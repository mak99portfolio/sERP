<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductCostingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_costings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('bill_of_lading_id');
            $table->foreign('bill_of_lading_id')->references('id')->on('bill_of_ladings')->onDelete('cascade');
            $table->double('insurance');
            $table->double('lc_charge');
            $table->double('retirement');
            $table->double('remittance');
            $table->double('dh_charge');
            $table->double('transport_charge');
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
        Schema::dropIfExists('product_costings');
    }
}
