<?php

use Illuminate\Database\Seeder;

class CnfTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'cnf_no' => 1313165,
                'bill_of_lading_id' => 1,
                'consignee' => 'maghnum',
                'bill_no' => 9786565,
                'bill_date' => \Carbon\Carbon::now(),
                'bill_of_entry_no' => 8911325,
                'bill_of_entry_date' => \Carbon\Carbon::now(),
                'arrival_date' => \Carbon\Carbon::now(),
                'delivery_date' => \Carbon\Carbon::now(),
                'job_no' => 74720,
                'cnf_value' => 6545445,
                'usd_amount' => 5489564,
                'exchange_rate' => 65,
                'bdt_amount' => 95466520,
                'total_day' => 21,
                'duty_payment_date' => \Carbon\Carbon::now(),
                'vendor_id' => 2,
                'note' => 'seeder 1',
                'company_id' => 1,
                'status' => 1,
                'creator_user_id' => 1,
            ],
            [
                'cnf_no' => 445613165,
                'bill_of_lading_id' => 2,
                'consignee' => 'maghnum',
                'bill_no' => 2466565,
                'bill_date' => \Carbon\Carbon::now(),
                'bill_of_entry_no' => 6541325,
                'bill_of_entry_date' => \Carbon\Carbon::now(),
                'arrival_date' => \Carbon\Carbon::now(),
                'delivery_date' => \Carbon\Carbon::now(),
                'job_no' => 86787620,
                'cnf_value' => 35445,
                'usd_amount' => 269564,
                'exchange_rate' => 45,
                'bdt_amount' => 867866520,
                'total_day' => 34,
                'duty_payment_date' => \Carbon\Carbon::now(),
                'vendor_id' => 1,
                'note' => 'seeder 1',
                'company_id' => 1,
                'status' => 1,
                'creator_user_id' => 1,
            ]
        ];

        \DB::table('cnfs')->insert($data);
        \DB::table('consignment_particular_cnfs')->insert([
            [
               'cnf_id' => 1,
               'consignment_particular_id' => 1,
               'amount' => 35345,
           ],
            [
                'cnf_id' => 1,
                'consignment_particular_id' => 2,
                'amount' => 4543.45,
           ],
            [
                'cnf_id' => 2,
                'consignment_particular_id' => 1,
                'amount' => 95435.45,
           ],
            [
                'cnf_id' => 2,
                'consignment_particular_id' => 2,
                'amount' => 72348.35,
           ]
       ]);
    }
}
