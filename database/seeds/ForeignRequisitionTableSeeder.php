<?php

use Illuminate\Database\Seeder;

class ForeignRequisitionTableSeeder extends Seeder
{

    public function run()
    {
        $data=[
        	[
                'creator_user_id'=>1,
                'requisition_title'=>'Test Requisition 1',
                'issued_date'=> \Carbon\Carbon::now(),
                'date_expected'=> \Carbon\Carbon::now(),
                'purpose_id'=>'3',
                'requisition_priority_id'=>'1',
                'note'=>'test1',
                'requisition_no'=>'25698451'
            ],
        	[
                'creator_user_id'=>1,
                'requisition_title'=>'Test Requisition 2',
                'issued_date'=> \Carbon\Carbon::now(),
                'date_expected'=> \Carbon\Carbon::now(),
                'purpose_id'=>'2',
                'requisition_priority_id'=>'2',
                'note'=>'test2',
                'requisition_no'=>'4352525'
            ],
        	[
                'creator_user_id'=>1,
                'requisition_title'=>'Test Requisition 3',
                'issued_date'=> \Carbon\Carbon::now(),
                'date_expected'=> \Carbon\Carbon::now(),
                'purpose_id'=>'3',
                'requisition_priority_id'=>'1',
                'note'=>'test3',
                'requisition_no'=>'95646544'
            ]
        ];

        \DB::table('foreign_requisitions')->insert($data);
    }
}
