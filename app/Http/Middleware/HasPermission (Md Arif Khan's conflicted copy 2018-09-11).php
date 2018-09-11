<?php

namespace App\Http\Middleware;

use Closure;

class HasPermission{

    public function handle($request, Closure $next, $name){

    	if(\Auth::check() && \Auth::user()->hasPermissionTo($name)) return $next($request);
    	return abort(404);

    }

}
