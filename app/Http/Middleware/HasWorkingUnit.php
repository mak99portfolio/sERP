<?php

namespace App\Http\Middleware;

use Closure;

class HasWorkingUnit{

    public function handle($request, Closure $next){

        $working_unit=\Auth::user()->working_unit();

        if(empty($working_unit)){
            return back()->with('failed', 'Sorry!, authenticated user does\'t associate with any working unit');
        }

        return $next($request);
        
    }

}
