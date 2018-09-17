<?php

use Illuminate\Database\Seeder;

class RequisitionPriorityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=[
        	['name'=>'Urgent'],
        	['name'=>'High'],
        	['name'=>'Low'],
        	['name'=>'Medium']
        ];

        \DB::table('requisition_priorities')->insert($data);
    }
}
