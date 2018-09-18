<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocalRequisitionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('local_requisitions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('requisition_priority_id')->unsigned();
            $table->foreign('requisition_priority_id')->references('id')->on('requisition_priorities')->onDelete('restrict');
            $table->integer('purpose_id')->unsigned();
            $table->foreign('purpose_id')->references('id')->on('requisition_purposes')->onDelete('restrict');
            $table->string('requisition_no')->nullable();
            $table->string('requisition_title')->nullable();
            $table->string('issued_date');
            $table->string('date_expected')->nullable();
            $table->text('note')->nullable();
            $table->integer('company_id')->unsigned();
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('restrict');
            $table->integer('creator_user_id')->unsigned();
            $table->foreign('creator_user_id')->references('id')->on('users')->onDelete('restrict');
            $table->integer('updator_user_id')->unsigned()->nullable();
            $table->foreign('updator_user_id')->references('id')->on('users')->onDelete('restrict');
            $table->tinyInteger('status')->nullable();
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
        Schema::dropIfExists('local_requisitions');
    }
}
