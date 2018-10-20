<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ResourcePlaceholder;

class ResourceController extends Controller{

	public function dynamic_resource($name){
		$resource='\App\\'.str_replace(['_', '-'], '', ucwords($name, '_-'));
		return ResourcePlaceholder::collection($resource::all());
	}

}
