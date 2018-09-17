<?php

use Illuminate\Database\Seeder;

class ProductUnitOfMeasurementTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=[
        	['id'=>1, 'name'=>"kilogram", 'short_name'=>'KG', 'creator_user_id'=>1],
        	['id'=>2, 'name'=>"Set ", 'short_name'=>'SET', 'creator_user_id'=>1],
        	['id'=>3, 'name'=>"Piece", 'short_name'=>'PCS', 'creator_user_id'=>1]
        ];

        \DB::table('unit_of_measurements')->insert($data);
    }
}
