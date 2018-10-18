<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ResourcePlaceholder;

class ResourceController extends Controller{

	public function customers(){
		return ResourcePlaceholder::collection(\App\Customer::all());
	}

	public function mushak_numbers(){
		return ResourcePlaceholder::collection(\App\MushakNumber::all());
	}

}
