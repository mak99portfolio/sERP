<?php

use Illuminate\Database\Seeder;

class ProductStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=[
        	['id'=>1, 'name'=>"Active", 'short_name'=>'AC'],
        	['id'=>2, 'name'=>"Inactive", 'short_name'=>'IN'],
        	['id'=>3, 'name'=>"Provision", 'short_name'=>'PR'],
            ['id'=>4, 'name'=>'Broken', 'short_name'=>'BP'],
            ['id'=>5, 'name'=>'Damaged', 'short_name'=>'DP'],
            ['id'=>6, 'name'=>'Expired', 'short_name'=>'EP']
        ];

        \DB::table('product_statuses')->insert($data);
    
    }
}
