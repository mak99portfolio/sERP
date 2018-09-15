<?php

use Illuminate\Database\Seeder;

class ProductGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=[
        	['id'=>1, 'name'=>"Sample", 'short_name'=>'SA', 'creator_user_id'=>1],
        	['id'=>2, 'name'=>"Service", 'short_name'=>'SE', 'creator_user_id'=>1],
        	['id'=>3, 'name'=>"Barcode", 'short_name'=>'BR', 'creator_user_id'=>1],
        	['id'=>4, 'name'=>"Saleable", 'short_name'=>'SAL', 'creator_user_id'=>1],
        	['id'=>5, 'name'=>"Maintenance", 'short_name'=>'MA', 'creator_user_id'=>1],
        ];

        \DB::table('product_groups')->insert($data);
    }
}
