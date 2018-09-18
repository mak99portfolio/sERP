<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkingUnitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){

        Schema::create('working_units', function (Blueprint $table) {
            $table->increments('id');
            $table->string('working_unit_id')->nullable();
            $table->integer('company_id')->unsigned()->nullable();
            $table->integer('parent_unit_id')->unsigned()->nullable();
            $table->integer('working_unit_type_id')->unsigned()->nullable();
            $table->string('name')->unique();
            $table->string('short_name')->unique()->nullable();
            $table->integer('in_charge')->unsigned();
            $table->text('address')->nullable();
            $table->integer('country_id')->nullable();
            $table->integer('division_id')->nullable();
            $table->integer('district_id')->nullable();
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('parent_unit_id')->references('id')->on('working_units')->onDelete('cascade');
            $table->foreign('working_unit_type_id')->references('id')->on('working_unit_types')->onDelete('cascade');
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');
            $table->foreign('division_id')->references('id')->on('divisions')->onDelete('cascade');
            $table->foreign('district_id')->references('id')->on('districts')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){

        Schema::dropIfExists('working_units');

    }
}
