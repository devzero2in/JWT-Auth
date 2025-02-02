<?php

namespace App\Http\Controllers\Auth;

use App\Helper\JWToken;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserSession;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserLoginController extends Controller
{

    public function login(Request $request){
        try {
            $request->validate([
                'email' => 'required|email',
                'password' => 'required|min:6',
            ]);

            $user = User::where('email', $request->email)->where('is_active', 1)->first();

            if ($user) {
                if (Hash::check($request->password, $user->password)) {

                    $authToken = JWToken::generateToken($user->id, $user->email, $user->role);

                    //add user session
                    UserSession::create([
                        'user_id' => $user->id,
                        'session_token' => $authToken,
                        'login_time' => now(),
                        'ip_address' => $request->ip(),
                        'user_agent' => $request->userAgent()
                    ]);

                    return response([
                        'user' => $user,
                        'status' => 'success',
                        'message' => 'User login successfully..!',
                        'authToken' => $authToken
                    ], 200)->cookie('authToken', $authToken, 3600);
                } else {
                    return response([
                        'status' => 'error',
                        'message' => 'Invalid password..!',
                    ]);
                }
            } else {
                return response([
                    'status' => 'error',
                    'message' => 'User not found..!',
                ]);
            }
        } catch (Exception $e) {
            return response([
                'status' => 'error',
                'message' => $e->getMessage(),
            ]);
        }
    }

    public function logout(Request $request){
        $authToken = $request->cookie('authToken');
        $authTokenResult = JWToken::decodeToken($authToken);

        if ($authToken == null) {
            // return response([
            //     'status' => 'error',
            //     'message' => 'User not logged in..!',
            // ], 500);
            //redirect to login page
            return redirect('/login');
        } else {
            $user_id = $authTokenResult->id;
            $userSession = UserSession::where('user_id', $user_id)
                ->where('session_token', $authToken)->where('logout_time', null)->first();

            $userSession->update([ 'logout_time' => now() ]);

            // return redirect('/login')->cookie('authToken', '', -1);

            return response([
                'status' => 'success',
                'message' => 'User logout successfully..!',
            ], 200)->cookie('authToken', '', -1);
        }
    }
}
