<?php

use Illuminate\Database\Seeder;

class LetterOfCreditTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $data=[
        	[
                'letter_of_credit_no'=>111,
                'letter_of_credit_date'=>\Carbon\Carbon::now(),
                'letter_of_credit_value'=>13434,
                'vendor_id'=>1,
                'letter_of_credit_expire_date'=>\Carbon\Carbon::now(),
                'letter_of_credit_status'=>1,
                'letter_of_credit_shipment_date'=>\Carbon\Carbon::now(),
                'currency'=>1,
                'beneficiary_ac_no'=>11,
                'beneficiary_ac_name'=>'Anis',
                'beneficiary_branch_name'=>'Panthopath',
                'beneficiary_bank_name'=>'Datch Bangla Bank',
                'issue_ac_no'=>1,
                'issue_ac_name'=>1,
                'issue_branch_name'=>1,
                'issue_bank_name'=>1,
                'partial_shipment'=>1,
                'transhipment_information'=>1,
                'company_id'=>1,
                'creator_user_id'=>1,
                ],
           [
                'letter_of_credit_no'=>112,
                'letter_of_credit_date'=>\Carbon\Carbon::now(),
                'letter_of_credit_value'=>10000,
                'vendor_id'=>1,
                'letter_of_credit_expire_date'=>\Carbon\Carbon::now(),
                'letter_of_credit_status'=>1,
                'letter_of_credit_shipment_date'=>\Carbon\Carbon::now(),
                'currency'=>1,
                'beneficiary_ac_no'=>23441,
                'beneficiary_ac_name'=>"ribon",
                'beneficiary_branch_name'=>"Panthopath branch",
                'beneficiary_bank_name'=>'Islami Bank',
                'issue_ac_no'=>1,
                'issue_ac_name'=>1,
                'issue_branch_name'=>1,
                'issue_bank_name'=>1,
                'partial_shipment'=>1,
                'transhipment_information'=>1,
                'company_id'=>1,
                'creator_user_id'=>1,
            ]

        ];

        \DB::table('letter_of_credits')->insert($data);
    }
}
