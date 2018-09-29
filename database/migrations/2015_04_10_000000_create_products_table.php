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
        Schema::create('product_statuses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('short_name');
        });
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('hs_code')->unique();
            $table->integer('product_category_id')->unsigned();
            $table->foreign('product_category_id')->references('id')->on('product_categories')->onDelete('cascade');
            $table->integer('product_pattern_id')->unsigned();
            $table->foreign('product_pattern_id')->references('id')->on('product_patterns')->onDelete('cascade');
            $table->integer('product_group_id')->unsigned();
            $table->foreign('product_group_id')->references('id')->on('product_groups')->onDelete('cascade');
            $table->integer('product_brand_id')->unsigned();
            $table->foreign('product_brand_id')->references('id')->on('product_brands')->onDelete('cascade');
            $table->string('model');
            $table->string('serial');
            $table->string('part_number');
            $table->integer('country_of_origin_country_id')->unsigned();
            $table->foreign('country_of_origin_country_id')->references('id')->on('countries')->onDelete('cascade');
            $table->integer('country_of_manufacture_country_id')->unsigned();
            $table->foreign('country_of_manufacture_country_id')->references('id')->on('countries')->onDelete('cascade');
            $table->integer('unit_of_measurement_id')->unsigned();
            $table->foreign('unit_of_measurement_id')->references('id')->on('unit_of_measurements')->onDelete('cascade');
            $table->integer('product_status_id')->unsigned();
            $table->foreign('product_status_id')->references('id')->on('product_statuses')->onDelete('cascade');
            $table->double('tp_rate');
            $table->double('mrp_rate');
            $table->double('flat_rate');
            $table->double('special_rate');
            $table->double('distribution_rate');
            $table->text('other');
            $table->integer('pack_size');
            $table->integer('shipper_carton_size');
            $table->text('description');
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
        Schema::dropIfExists('products');
        Schema::dropIfExists('product_statuses');
    }
}
