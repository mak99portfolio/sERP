<?php

use Illuminate\Database\Seeder;

class ProductSetTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=[
        	['name'=>"TTF", 'short_name'=>'TTF', 'creator_user_id'=>1],
        	['name'=>"TT", 'short_name'=>'TT', 'creator_user_id'=>1],
        	['name'=>"T", 'short_name'=>'T', 'creator_user_id'=>1],
        	['name'=>"None", 'short_name'=>'no', 'creator_user_id'=>1],
        ];

        \DB::table('product_sets')->insert($data);

    }
}
