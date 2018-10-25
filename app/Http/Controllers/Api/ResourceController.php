<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ResourcePlaceholder;

class ResourceController extends Controller{

	public function dynamic_resource(Request $request, $name){

		$resource='\App\\'.str_replace(['_', '-'], '', ucwords($name, '_-'));

		if($request->get('query')){

			$resource=$resource::where(json_decode($request->get('query'), true));

		}

		if(is_string($resource) && $request->get('with')){

			$resource=$resource::with($request->get('with'));

		}elseif($request->get('with')){

			$resource=$resource->with($request->get('with'));

		}

		if(is_string($resource) && $request->get('where_in')){

			$resource=$resource::whereIn($request->get('field'), $request->get('where_in'));

		}elseif($request->get('where_in')){

			$resource=$resource->WhereIn($request->get('field'), $request->get('where_in'));

		}

		if(is_string($resource)) return ResourcePlaceholder::collection($resource::all());
		return ResourcePlaceholder::collection($resource->get());

	}

}
