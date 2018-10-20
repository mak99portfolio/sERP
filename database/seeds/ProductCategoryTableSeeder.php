<?php

use Illuminate\Database\Seeder;

class ProductCategoryTableSeeder extends Seeder{

    public function run(){

        $data=[
        	['parent_product_category_id'=>null, 'name'=>'Oman Oil', 'short_name'=>'ol','creator_user_id'=>1],
        	['parent_product_category_id'=>null, 'name'=>'MRF Tyre', 'short_name'=>'mt','creator_user_id'=>1],
        ];

        \DB::table('product_categories')->insert($data);

    }

}
