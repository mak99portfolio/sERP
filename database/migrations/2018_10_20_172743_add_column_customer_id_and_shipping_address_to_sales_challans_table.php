<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnCustomerIdAndShippingAddressToSalesChallansTable extends Migration{

    public function up(){

        Schema::table('sales_challans', function (Blueprint $table){

            $table->integer('customer_id')->unsigned()->nullable()->after('sales_challan_no');
            $table->integer('shipping_address_id')->unsigned()->nullable()->after('delivery_person_id');

            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
            $table->foreign('shipping_address_id')->references('id')->on('customer_addresses')->onDelete('cascade');

        });

    }

    public function down(){

        Schema::table('sales_challans', function (Blueprint $table){

            $table->dropColumn('customer_id');
            $table->dropColumn('shipping_address_id');

        });

    }
}
