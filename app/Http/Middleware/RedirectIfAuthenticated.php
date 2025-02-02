<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Helper\JWToken;
use Exception;

class RedirectIfAuthenticated
{
    public function handle(Request $request, Closure $next)
    {
        $token = $request->cookie('authToken');
        
        if ($token) {
            try {
                // Decode and verify the token
                $tokenData = JWToken::decodeToken($token);
                
                if ($tokenData !== 'unauthorized') {
                    // Token is valid, redirect based on role
                    if ($tokenData->role === 'admin') {
                        //add a toastr notification
                        return redirect()->route('admin.dashboard')->with('toast_warning', 'You are already logged in!');
                    } else {
                        return redirect()->route('user.dashboard')->with('toast_warning', 'You are already logged in!');
                    }
                }
            } catch (Exception $e) {
                // Token is invalid or expired, remove it
                return response()
                    ->view('auth.login')
                    ->cookie('authToken', '', -1);
            }
        }

        return $next($request);
    }
}
