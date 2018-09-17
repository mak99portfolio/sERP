<?php

use Illuminate\Database\Seeder;

class BankTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=[
        	['creator_user_id'=>1, 'name'=>'Bank Asia', 'short_name'=>'BA', 'description'=>'Bank of Asia', 'country_id'=>'1'],
        	['creator_user_id'=>1, 'name'=>'Douch Bangla Bank', 'short_name'=>'DBBL', 'description'=>'Douch Bangla Bank LTD.', 'country_id'=>'1']
        ];

        \DB::table('banks')->insert($data);
    }
}
