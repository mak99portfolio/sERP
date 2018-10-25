<?php

use Illuminate\Database\Seeder;

class CompanyProfileTableSeeder extends Seeder
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
                'name'=>'MAGNUM ENTERPRISE LIMITED',  
                'email'=>'info@magnumenterprise.net', 
                'phone'=>'01823-777-992', 
                'telephone'=>'02 8981941', 
                'fax'=>'88 02 8981942', 
                'website'=>'www.magnumenterprise.net', 
                'address'=>'531 DHAUR (KAMARPARA), NISHATHNAGAR, TURAG, DHAKA -1711', 
                'country_id'=>'1',
                'creator_user_id'=>1
            ],
            [
                'name'=>'POPULAR MOTORS',  
                'email'=>'info@magnumenterprise.net', 
                'phone'=>'01823-777-992', 
                'telephone'=>'02 8981941', 
                'fax'=>'88 02 8981942', 
                'website'=>'www.magnumenterprise.net', 
                'address'=>'531 DHAUR (KAMARPARA), NISHATHNAGAR, TURAG, DHAKA -1711', 
                'country_id'=>'1',
                'creator_user_id'=>1
            ],
            [
                'name'=>'MAGNUM PETROLEUM  LIMITED ',  
                'email'=>': info@magnumenterprise.net', 
                'phone'=>'01823-777-992', 
                'telephone'=>'02 8981941', 
                'fax'=>'88 02 8981942', 
                'website'=>'www.magnumenterprise.net', 
                'address'=>'531 DHAUR (KAMARPARA), NISHATHNAGAR, TURAG, DHAKA -1711', 
                'country_id'=>'1',
                'creator_user_id'=>1
            ],
            
        ];

        \DB::table('company_profiles')->insert($data);
    }
}
