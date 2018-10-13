<?php

use Illuminate\Database\Seeder;

class CustomerTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=[
        	['name'=>'Dealer', 'short_name'=>'Dealer','creator_user_id'=>1],
        	['name'=>'Individual', 'short_name'=>'Individual','creator_user_id'=>1],
        	['name'=>'Corporation', 'short_name'=>'Corporation','creator_user_id'=>1],
        	['name'=>'Distributor', 'short_name'=>'Distributor','creator_user_id'=>1],
        ];

        \DB::table('customer_types')->insert($data);

    }
}
