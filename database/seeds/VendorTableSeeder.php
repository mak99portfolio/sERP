<?php

use Illuminate\Database\Seeder;
class VendorTableSeeder extends Seeder
{

    public function run()
    {
        $data1=[
        	[
                'creator_user_id'=>1,
                'name'=>'MRF',
                'vendor_id'=>'123456789',
                'status_id'=>'1',
                'establishment_date'=> \Carbon\Carbon::now(),
                'country_id'=>'2',
                'vendor_category_id'=>'2',
                'zip_code'=>'1205',
                'telephone'=>'25698451',
                'fax'=>'fax-2156',
                'website'=>'mrf.com',
                'email'=>'mrf@gmail.com',
                'tin_no'=>'tin-551546',
                'trade_license_no'=>'trade-5985464',
                'trade_license_issue_date'=> \Carbon\Carbon::now(),
                'certificate_of_incorporation'=>'certificate',
                'incorporation_date'=> \Carbon\Carbon::now(),
                'vat_no'=>'vat-98845646',
                'business_type'=>serialize(['Ltd. Company']),
                'business_nature'=>serialize(['Service Provide']),
                'credit_period'=>'3',
                'credit_limit'=>'500000',
                'address'=>'Kolkata'
            ],
        	[
                'creator_user_id'=>1,
                'name'=>'Oman Oil',
                'vendor_id'=>'456545789',
                'status_id'=>'1',
                'establishment_date'=> \Carbon\Carbon::now(),
                'country_id'=>'1',
                'vendor_category_id'=>'1',
                'zip_code'=>'1523',
                'telephone'=>'984523121',
                'fax'=>'fax-43246',
                'website'=>'oman.oil.com',
                'email'=>'oman.oil@gmail.com',
                'tin_no'=>'tin-345546',
                'trade_license_no'=>'trade-3235464',
                'trade_license_issue_date'=> \Carbon\Carbon::now(),
                'certificate_of_incorporation'=>'certificate',
                'incorporation_date'=> \Carbon\Carbon::now(),
                'vat_no'=>'vat-845445646',
                'business_type'=>serialize(['Partnership']),
                'business_nature'=>serialize(['Contractor']),
                'credit_period'=>'5',
                'credit_limit'=>'300000',
                'address'=>'Khulna'
            ]
        ];

        $data2=[
        	[
                'vendor_id'=>'1',
                'net_days'=>'15',
                'payment_discount'=>'5',
                'other_discount'=>'0',
                'discount_terms'=>'nothing'
            ],
        	[
                'vendor_id'=>'2',
                'net_days'=>'45',
                'payment_discount'=>'2',
                'other_discount'=>'0',
                'discount_terms'=>'no'
            ]
        ];

        $data3 = [
            [
               'vendor_id' => '1',
                'ac_no' => 'AC-0016568984',
                'ac_name' => 'MRF Account',
                'bank_name' => 'LIC Bank',
                'branch_name' => 'Kolkata branch',
                'swift_code' => 'LIC-123',
                'address' => 'Kolkata',
            ],
            [
               'vendor_id' => '2',
                'ac_no' => 'AC-23416568984',
                'ac_name' => 'Oman Oil Account',
                'bank_name' => 'DBBL Bank',
                'branch_name' => 'Khulna branch',
                'swift_code' => 'DBBL-123',
                'address' => 'Khulna',
            ]
        ];

        $data4 = [
            [
               'vendor_id' => '1',
               'name'=> 'Libon Khan',
               'designation'=> 'Software Engineer',
               'telephone'=> '20155656',
               'email'=> 'libon@gmail.com',
               'role'=> 'Laravel Developer',
               'mobile'=> '01956974156'
            ],
            [
               'vendor_id' => '2',
               'name'=> 'Atik Rahman',
               'designation'=> 'UI Designer',
               'telephone'=> '20155656',
               'email'=> 'atik@gmail.com',
               'role'=> 'UI',
               'mobile'=> '01617415654'
            ]
        ];


        \DB::table('vendors')->insert($data1);
        \DB::table('vendor_payment_terms')->insert($data2);
        \DB::table('vendor_banks')->insert($data3);
        \DB::table('vendor_contacts')->insert($data4);
    }
}
