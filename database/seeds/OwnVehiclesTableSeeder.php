<?php
use Illuminate\Database\Seeder;

class OwnVehiclesTableSeeder extends Seeder{

    public function run(){
        
    	$data=[
    		['vehicle_no'=>'VHI001', 'employee_profile_id'=>'4', 'license_number'=>'1234-3654-3212']
    	];

    	\DB::table('own_vehicles')->insert($data);

    }

}
