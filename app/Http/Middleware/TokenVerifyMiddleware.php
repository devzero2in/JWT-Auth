<?php

namespace App\Http\Middleware;

use App\Helper\JWToken;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TokenVerifyMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $authToken = $request->cookie('authToken');
        $authTokenResult = JWToken::decodeToken($authToken);

        if($authTokenResult == 'unauthorized'){
            return redirect('/login');
        }else if( empty($authTokenResult->role)){
            $request->headers->set('email', $authTokenResult->email);
            return $next($request);
        }else{
            $request->headers->set('email', $authTokenResult->email);
            $request->headers->set('id', $authTokenResult->id);
            $request->headers->set('role', $authTokenResult->role);
            return $next($request);
        }
    }
}
