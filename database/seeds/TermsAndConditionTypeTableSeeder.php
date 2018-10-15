<?php

use Illuminate\Database\Seeder;

class TermsAndConditionTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=[
        	['creator_user_id'=>1, 'name'=>'Payment Condition', 'short_name'=>'PC'],
        	['creator_user_id'=>1, 'name'=>'Delivery Terms', 'short_name'=>'DT'],
        	['creator_user_id'=>1, 'name'=>'Warranty Terms', 'short_name'=>'WT'],
        	['creator_user_id'=>1, 'name'=>'Security Terms', 'short_name'=>'ST']
        ];

        \DB::table('terms_and_condition_types')->insert($data);
    }
}
