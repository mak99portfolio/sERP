<?php

use Illuminate\Database\Seeder;

class ProductModelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=[
        	['name'=>"BAIS ", 'short_name'=>'BAIS ', 'creator_user_id'=>1],
        	['name'=>"RADIAL", 'short_name'=>'RADIAL', 'creator_user_id'=>1],
        	['name'=>"Mono Grade", 'short_name'=>'Mono Grade', 'creator_user_id'=>1],
        	['name'=>"Multi Grade", 'short_name'=>'Multi Grade', 'creator_user_id'=>1]
        ];

        \DB::table('product_models')->insert($data);

    }
}
