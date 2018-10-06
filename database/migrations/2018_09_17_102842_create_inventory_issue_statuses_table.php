<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInventoryIssueStatusesTable extends Migration{

    public function up(){

        Schema::create('inventory_issue_statuses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('code')->unique();
            $table->timestamps();
        });
    }


    public function down(){
        Schema::dropIfExists('inventory_issue_statuses');
    }
    
}
