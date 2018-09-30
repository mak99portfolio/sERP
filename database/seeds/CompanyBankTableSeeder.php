<?php

use Illuminate\Database\Seeder;

class CompanyBankTableSeeder extends Seeder
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
                'account_no' => 'ACC-957454654',
                'account_name' => 'Rohit Islam',
                'bank_id' => 1,
                'branch_name' => 'Azimpur',
                'swift_code' => 'SC-24235',
                'address' => 'Dhaka',
                'company_id' => 1,
                'creator_user_id' => 1,
            ],
            [
                'account_no' => 'ACC-7421354654',
                'account_name' => 'Anisul Islam',
                'bank_id' => 2,
                'branch_name' => 'New Paltan',
                'swift_code' => 'SC-4232435',
                'address' => 'Dhaka-1205',
                'company_id' => 1,
                'creator_user_id' => 1,
            ]
        ];

        \DB::table('company_banks')->insert($data);
    }
}
