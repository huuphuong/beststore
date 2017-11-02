<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

use App\Api;
use App\User;

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
        $data = decrypt($request->header('authors'));
        $count = User::where('id', $data->id)->count();

        if (isset($data) && $count > 0) {
            return $next($request);
        }else {
            $res = Api::resourceApi(Api::$_FORBIDDEN, 'You don\'t have permission');
            return response()->json($res, Api::$_OK);
        }
    }
}
