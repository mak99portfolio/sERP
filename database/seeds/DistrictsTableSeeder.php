<?php

use Illuminate\Database\Seeder;

class DistrictsTableSeeder extends Seeder{

    public function run(){

    	$data=[
			['country_id'=>1, 'division_id'=>3, 'name'=>'Dhaka', 'latitute'=>23.7115253, 'longitude'=>90.4111451],
			['country_id'=>1, 'division_id'=>3, 'name'=>'Faridpur', 'latitute'=>23.6070822, 'longitude'=>89.8429406],
			['country_id'=>1, 'division_id'=>3, 'name'=>'Gazipur','latitute'=>24.0022858, 'longitude'=>90.4264283],
			['country_id'=>1, 'division_id'=>3, 'name'=>'Gopalganj', 'latitute'=>23.0050857, 'longitude'=>89.8266059],
			['country_id'=>1, 'division_id'=>8, 'name'=>'Jamalpur', 'latitute'=>24.937533, 'longitude'=>89.937775],
			['country_id'=>1, 'division_id'=>3, 'name'=>'Kishoreganj', 'latitute'=>24.444937, 'longitude'=>90.776575],
			['country_id'=>1, 'division_id'=>3, 'name'=>'Madaripur', 'latitute'=>23.164102, 'longitude'=>90.1896805],
			['country_id'=>1, 'division_id'=>3, 'name'=>'Manikganj', 'latitute'=>0, 'longitude'=>0],
			['country_id'=>1, 'division_id'=>3, 'name'=>'Munshiganj', 'latitute'=>0, 'longitude'=>0],
			['country_id'=>1, 'division_id'=> 8, 'name'=>'Mymensingh', 'latitute'=>0, 'longitude'=>0],
			['country_id'=>1, 'division_id'=> 3, 'name'=>'Narayanganj', 'latitute'=>23.63366, 'longitude'=>90.49648],
			['country_id'=>1, 'division_id'=> 3, 'name'=>'Narsingdi', 'latitute'=>23.932233, 'longitude'=>90.71541],
			['country_id'=>1, 'division_id'=> 8, 'name'=>'Netrokona', 'latitute'=>24.870955, 'longitude'=>90.72788],
			['country_id'=>1, 'division_id'=> 3, 'name'=>'Rajbari', 'latitute'=>23.7574305, 'longitude'=>89.6444665],
			['country_id'=>1, 'division_id'=> 3, 'name'=>'Shariatpur', 'latitute'=>0, 'longitude'=>0],
			['country_id'=>1, 'division_id'=> 8, 'name'=>'Sherpur', 'latitute'=>25.0204933, 'longitude'=>90.0152966],
			['country_id'=>1, 'division_id'=> 3, 'name'=>'Tangail', 'latitute'=>0, 'longitude'=>0],
			['country_id'=>1, 'division_id'=> 5, 'name'=>'Bogura', 'latitute'=>24.8465228, 'longitude'=>89.377755],
			['country_id'=>1, 'division_id'=> 5, 'name'=>'Joypurhat', 'latitute'=>0, 'longitude'=>0],
			['country_id'=>1, 'division_id'=> 5, 'name'=>'Naogaon', 'latitute'=>0, 'longitude'=>0],
			['country_id'=>1, 'division_id'=> 5, 'name'=>'Natore', 'latitute'=>24.420556, 'longitude'=>89.000282],
			['country_id'=>1, 'division_id'=> 5, 'name'=>'Nawabganj', 'latitute'=>24.5965034, 'longitude'=>88.2775122],
			['country_id'=>1, 'division_id'=> 5, 'name'=>'Pabna', 'latitute'=>23.998524, 'longitude'=>89.233645],
			['country_id'=>1, 'division_id'=> 5, 'name'=>'Rajshahi', 'latitute'=>0, 'longitude'=>0],
			['country_id'=>1, 'division_id'=> 5, 'name'=>'Sirajgonj', 'latitute'=>24.4533978, 'longitude'=>89.700681],
			['country_id'=>1, 'division_id'=> 6, 'name'=>'Dinajpur', 'latitute'=>25.6217061, 'longitude'=>88.6354504],
			['country_id'=>1, 'division_id'=> 6, 'name'=>'Gaibandha', 'latitute'=>25.328751, 'longitude'=>89.528088],
			['country_id'=>1, 'division_id'=> 6, 'name'=>'Kurigram', 'latitute'=>25.805445, 'longitude'=>89.636174],
			['country_id'=>1, 'division_id'=> 6, 'name'=>'Lalmonirhat', 'latitute'=>0, 'longitude'=>0],
			['country_id'=>1, 'division_id'=> 6, 'name'=>'Nilphamari', 'latitute'=>25.931794, 'longitude'=>88.856006],
			['country_id'=>1, 'division_id'=> 6, 'name'=>'Panchagarh', 'latitute'=>26.3411, 'longitude'=>88.5541606],
			['country_id'=>1, 'division_id'=> 6, 'name'=>'Rangpur', 'latitute'=>25.7558096, 'longitude'=>89.244462],
			['country_id'=>1, 'division_id'=> 6, 'name'=>'Thakurgaon', 'latitute'=>26.0336945, 'longitude'=>88.461683],
			['country_id'=>1, 'division_id'=> 1, 'name'=>'Barguna', 'latitute'=>0, 'longitude'=>0],
			['country_id'=>1, 'division_id'=> 1, 'name'=>'Barishal' , 'latitute'=>0, 'longitude'=>0],
			['country_id'=>1, 'division_id'=> 1, 'name'=>'Bhola', 'latitute'=>22.685923, 'longitude'=>90.648179],
			['country_id'=>1, 'division_id'=> 1, 'name'=>'Jhalokati', 'latitute'=>0, 'longitude'=>0],
			['country_id'=>1, 'division_id'=> 1, 'name'=>'Patuakhali', 'latitute'=>22.3596316, 'longitude'=>90.3298712],
			['country_id'=>1, 'division_id'=> 1, 'name'=>'Pirojpur', 'latitute'=>0, 'longitude'=>0],
			['country_id'=>1, 'division_id'=> 2, 'name'=>'Bandarban', 'latitute'=>22.1953275, 'longitude'=>92.2183773],
			['country_id'=>1, 'division_id'=> 2, 'name'=>'Brahmanbaria', 'latitute'=>23.9570904, 'longitude'=>91.1119286],
			['country_id'=>1, 'division_id'=> 2, 'name'=>'Chandpur', 'latitute'=>23.2332585, 'longitude'=>90.6712912],
			['country_id'=>1, 'division_id'=> 2, 'name'=>'Chattogram', 'latitute'=>22.335109, 'longitude'=>91.83407],
			['country_id'=>1, 'division_id'=> 2, 'name'=>'Cumilla', 'latitute'=>23.4682747, 'longitude'=>91.1788135],
			['country_id'=>1, 'division_id'=> 2, 'name'=>'Cox\'s Bazar', 'latitute'=>0, 'longitude'=>0],
			['country_id'=>1, 'division_id'=> 2, 'name'=>'Feni', 'latitute'=>23.023231, 'longitude'=>91.3840844],
			['country_id'=>1, 'division_id'=> 2, 'name'=>'Khagrachari', 'latitute'=>23.119285, 'longitude'=>91.98466],
			['country_id'=>1, 'division_id'=> 2, 'name'=>'Lakshmipur', 'latitute'=>22.942477, 'longitude'=>90.841184],
			['country_id'=>1, 'division_id'=> 2, 'name'=>'Noakhali', 'latitute'=>22.869563, 'longitude'=>91.099398],
			['country_id'=>1, 'division_id'=> 2, 'name'=>'Rangamati', 'latitute'=>0, 'longitude'=>0],
			['country_id'=>1, 'division_id'=> 7, 'name'=>'Habiganj', 'latitute'=>24.374945, 'longitude'=>91.41553],
			['country_id'=>1, 'division_id'=> 7, 'name'=>'Maulvibazar', 'latitute'=>24.482934, 'longitude'=>91.777417],
			['country_id'=>1, 'division_id'=> 7, 'name'=>'Sunamganj', 'latitute'=>25.0658042, 'longitude'=>91.395011],
			['country_id'=>1, 'division_id'=> 7, 'name'=>'Sylhet', 'latitute'=>24.8897956, 'longitude'=>91.8697894],
			['country_id'=>1, 'division_id'=> 4, 'name'=>'Bagerhat', 'latitute'=>22.651568, 'longitude'=>89.785938],
			['country_id'=>1, 'division_id'=> 4, 'name'=>'Chuadanga', 'latitute'=>23.6401961, 'longitude'=>88.841841],
			['country_id'=>1, 'division_id'=> 4, 'name'=>'Jashore', 'latitute'=>23.16643, 'longitude'=>89.2081126],
			['country_id'=>1, 'division_id'=> 4, 'name'=>'Jhenaidah', 'latitute'=>23.5448176, 'longitude'=>89.1539213],
			['country_id'=>1, 'division_id'=> 4, 'name'=>'Khulna', 'latitute'=>22.815774, 'longitude'=>89.568679],
			['country_id'=>1, 'division_id'=> 4, 'name'=>'Kushtia', 'latitute'=>23.901258, 'longitude'=>89.120482],
			['country_id'=>1, 'division_id'=> 4, 'name'=>'Magura', 'latitute'=>23.487337, 'longitude'=>89.419956],
			['country_id'=>1, 'division_id'=> 4, 'name'=>'Meherpur', 'latitute'=>23.762213, 'longitude'=>88.631821],
			['country_id'=>1, 'division_id'=> 4, 'name'=>'Narail', 'latitute'=>23.172534, 'longitude'=>89.512672],
			['country_id'=>1, 'division_id'=> 4, 'name'=>'Satkhira','latitute'=>0, 'longitude'=>0]
		];

		\DB::table('districts')->insert($data);

    }

}
