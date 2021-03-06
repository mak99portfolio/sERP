<?php

use Illuminate\Database\Seeder;

class LocalRequisitionTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $data = [
            [
                'creator_user_id' => 1,
                'requisition_title' => 'Test Requisition 1',
                'issued_date' => \Carbon\Carbon::now(),
                'date_expected' => \Carbon\Carbon::now(),
                'requisition_purpose_id' => '3',
                'requisition_priority_id' => '1',
                'note' => 'test1',
                'requisition_no' => '25698451',
                'company_id' => 1
            ],
            [
                'creator_user_id' => 1,
                'requisition_title' => 'Test Requisition 2',
                'issued_date' => \Carbon\Carbon::now(),
                'date_expected' => \Carbon\Carbon::now(),
                'requisition_purpose_id' => '2',
                'requisition_priority_id' => '2',
                'note' => 'test2',
                'requisition_no' => '4352525',
                'company_id' => 1
            ],
            [
                'creator_user_id' => 1,
                'requisition_title' => 'Test Requisition 3',
                'issued_date' => \Carbon\Carbon::now(),
                'date_expected' => \Carbon\Carbon::now(),
                'requisition_purpose_id' => '3',
                'requisition_priority_id' => '1',
                'note' => 'test3',
                'requisition_no' => '95646544',
                'company_id' => 1
            ]
        ];
        $data1 = [
            [
                'local_requisition_id' => 1,
                'product_id' => 1,
                'quantity' => '500'
            ],
            [
                'local_requisition_id' => 2,
                'product_id' => 2,
                'quantity' => '50'
            ],
            [
                'local_requisition_id' => 3,
                'product_id' => 3,
                'quantity' => '50'
            ],
            [
                'local_requisition_id' => 3,
                'product_id' => 2,
                'quantity' => '500'
            ],
            [
                'local_requisition_id' => 3,
                'product_id' => 1,
                'quantity' => '80'
            ],
            [
                'local_requisition_id' => 1,
                'product_id' => 2,
                'quantity' => '55'
            ]
        ];

        \DB::table('local_requisitions')->insert($data);
        \DB::table('local_requisition_items')->insert($data1);
    }

}
