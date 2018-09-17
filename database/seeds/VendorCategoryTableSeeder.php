<?php

use Illuminate\Database\Seeder;

class VendorCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=[
        	['creator_user_id'=>1, 'name'=>'Local Vendor', 'short_name'=>'LV', 'description'=> 'local vendor'],
        	['creator_user_id'=>1, 'name'=>'Foreign Vendor', 'short_name'=>'FV', 'description'=> 'foreign vendor']
        ];

        \DB::table('vendor_categories')->insert($data);
    }
}
