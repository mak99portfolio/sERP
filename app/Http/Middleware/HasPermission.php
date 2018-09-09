<?php

namespace App\Http\Middleware;

use Closure;

class HasPermission{

    public function handle($request, Closure $next){

        return $next($request);

    }

}
