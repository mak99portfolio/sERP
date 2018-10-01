<?php

use Illuminate\Database\Seeder;

class CurrencyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=[
        	['name'=>'Dollar', 'short_name'=>'do','creator_user_id'=>1],
        ];

        \DB::table('currencies')->insert($data);

    }
}
