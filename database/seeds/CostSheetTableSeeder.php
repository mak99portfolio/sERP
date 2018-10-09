<?php

use Illuminate\Database\Seeder;

class CostSheetTableSeeder extends Seeder
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
                'cost_sheet_no' => 213213,
                'letter_of_credit_id' => 1,
                'currency' => 'Dollar',
                'exchange_rate' => 80,
                'bdt_amount' => 1074720,
                'note' => 'seeder 1',
                'company_id' => 1,
                'status' => 1,
                'creator_user_id' => 1,
            ],
            [
                'cost_sheet_no' => 654213,
                'letter_of_credit_id' => 1,
                'currency' => 'Dollar',
                'exchange_rate' => 75,
                'bdt_amount' => 1007550,
                'note' => 'seeder 2',
                'company_id' => 1,
                'status' => 1,
                'creator_user_id' => 1,
            ]
        ];

        \DB::table('cost_sheets')->insert($data);
        \DB::table('cost_sheet_particulars')->insert([
            [
               'cost_sheet_id' => 1,
               'percent_of_lc_margin' => 5,
               'amount_of_lc_margin' => 50377.5,
               'round_amount_of_lc_margin' => 50378,
               'percent_of_lc_commision' => 10,
               'amount_of_lc_commision' => 100755,
               'round_amount_of_lc_commision' => 100755,
               'percent_of_vat' => 15,
               'amount_of_vat' => 15113.25,
               'round_amount_of_vat' => 15114,
               /*'percent_of_swift' => 1,
               'amount_of_swift' => 200,
               'round_amount_of_swift' => 20,
               'percent_of_stamp_charge' => 1,
               'amount_of_stamp_charge' => 200,
               'round_amount_of_stamp_charge' => 20,
               'percent_of_lcaf_issue_charge' => 1,
               'amount_of_lcaf_issue_charge' => 200,
               'round_amount_of_lcaf_issue_charge' => 20,
               'percent_of_imp' => 1,
               'amount_of_imp' => 200,
               'round_amount_of_imp' => 20,
               'percent_of_lc_application_form' => 1,
               'amount_of_lc_application_form' => 200,
               'round_amount_of_lc_application_form' => 20,
               'percent_of_others' => 1,
               'amount_of_others' => 200,
               'round_amount_of_others' => 20,
               */
            ],
            [
                'cost_sheet_id' => 2,
                'percent_of_lc_margin' => 10,
                'amount_of_lc_margin' => 100755,
                'round_amount_of_lc_margin' => 100755,
                'percent_of_lc_commision' => 15,
                'amount_of_lc_commision' => 151132.5,
                'round_amount_of_lc_commision' => 151133,
                'percent_of_vat' => 15,
                'amount_of_vat' => 22669.875,
                'round_amount_of_vat' => 22670,
                /*'percent_of_swift' => 1,
                'amount_of_swift' => 200,
                'round_amount_of_swift' => 20,
                'percent_of_stamp_charge' => 1,
                'amount_of_stamp_charge' => 200,
                'round_amount_of_stamp_charge' => 20,
                'percent_of_lcaf_issue_charge' => 1,
                'amount_of_lcaf_issue_charge' => 200,
                'round_amount_of_lcaf_issue_charge' => 20,
                'percent_of_imp' => 1,
                'amount_of_imp' => 200,
                'round_amount_of_imp' => 20,
                'percent_of_lc_application_form' => 1,
                'amount_of_lc_application_form' => 200,
                'round_amount_of_lc_application_form' => 20,
                'percent_of_others' => 1,
                'amount_of_others' => 200,
                'round_amount_of_others' => 20,
                */
            ]
       ]);
    }
}
