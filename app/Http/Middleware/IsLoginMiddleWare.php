<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

use App\Api;

class IsLoginMiddleWare
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
       
        if (Auth::check()) {

            return $next($request);    
        }else {
            $res = Api::resourceApi(Api::$_FORBIDDEN, 'You don\'t have permission');
            return response()->json($res, Api::$_OK);
        }
    }
}
