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
        	['name'=>"TL", 'short_name'=>'TL', 'creator_user_id'=>1],
        ];

        \DB::table('product_sets')->insert($data);

    }
}
