<?php

namespace App\Http\Middleware;

use App\Helper\JWToken;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        $authToken = $request->cookie('authToken');
        $authTokenResult = JWToken::decodeToken($authToken);
        $role = $authTokenResult->role;

        if (!in_array($authTokenResult->role, $roles)) {
            // return response([
            //     'status' => 'error',
            //     'message' => 'Unauthorized',
            // ]);
            // return redirect(403, 'Unauthorized');
            return abort(403, 'Unauthorized');
        }else{
            $request->headers->set('role', $authTokenResult->role);
            return $next($request);
        }



//        return $next($request);
    }
}
