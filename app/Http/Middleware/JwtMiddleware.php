<?php

namespace App\Http\Middleware;

use Closure;
use JWTAuth;
use Exception;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;

class JwtMiddleware
{

    // protected $except = [
    //     'broadcasting/auth',
    // ];
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        try {
            $user = JWTAuth::parseToken()->authenticate();
        } catch (Exception $e) {
            if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException){
                return response()->json(['status' => 'INVALID_TOKEN','message'=>'Login token Invalid']);
            }else if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException){
                
                return response()->json(['status' => 'EXPIRED_TOKEN','message'=>'User Session Expired']);
            }else{
                return response()->json(['status' => 'EMPTY_TOKEN','message'=>'Authorization Token not found']);
            }
        }
        return $next($request);
    }
}
