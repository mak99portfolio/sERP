<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerEnclosuresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_enclosures', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('customer_profile_id')->unsigned();
            $table->foreign('customer_profile_id')->references('id')->on('customer_profiles')->onDelete('cascade');
            $table->integer('enclosure_id')->unsigned();
            $table->foreign('enclosure_id')->references('id')->on('enclosures')->onDelete('cascade');
            $table->string('file_directory');
            $table->string('file_name');
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
        Schema::dropIfExists('customer_enclosures');
    }
}
