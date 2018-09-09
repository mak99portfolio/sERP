<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('product_category_id')->unsigned();
            $table->foreign('product_category_id')->references('id')->on('product_categories')->onDelete('restrict');
            $table->integer('product_pattern_id')->unsigned();
            $table->foreign('product_pattern_id')->references('id')->on('product_patterns')->onDelete('restrict');
            $table->integer('product_group_id')->unsigned();
            $table->foreign('product_group_id')->references('id')->on('product_groups')->onDelete('restrict');
            $table->integer('product_brand_id')->unsigned();
            $table->foreign('product_brand_id')->references('id')->on('product_brands')->onDelete('restrict');
            $table->string('model');
            $table->string('serial');
            $table->string('part_number');
            $table->integer('country_of_origin_id')->unsigned();
            $table->foreign('country_of_origin_id')->references('id')->on('country_of_origins')->onDelete('restrict');
            $table->integer('country_of_manufacture_id')->unsigned();
            $table->foreign('country_of_manufacture_id')->references('id')->on('country_of_manufactures')->onDelete('restrict');
            $table->integer('unit_of_measurement_id')->unsigned();
            $table->foreign('unit_of_measurement_id')->references('id')->on('unit_of_measurements')->onDelete('restrict');
            $table->integer('product_status_id')->unsigned();
            $table->foreign('product_status_id')->references('id')->on('product_statuses')->onDelete('restrict');
            $table->double('tp_rate');
            $table->double('mrp_rate');
            $table->double('flat_rate');
            $table->double('special_rate');
            $table->double('distribution_rate');
            $table->integer('pack_size');
            $table->integer('shipper_carton_size');
            $table->text('description');
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
        Schema::dropIfExists('products');
    }
}
