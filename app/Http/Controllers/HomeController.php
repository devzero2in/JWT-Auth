<?php

namespace App\Http\Controllers;

use App\Helper\JWToken;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function forgotPassword()
    {
        return view('auth.forgot-password');
    }

    public function verifyOTP()
    {
        return view('auth.verify-otp');
    }

    public function resetPassword(Request $request)
    {
        $token = $request->cookie('authToken');
        $tokenResult = JWToken::decodeToken($token);

        //if token result is unauthorized or tokenresult->role is not empty, redirect to login page
        if ($tokenResult == 'unauthorized' || !empty($tokenResult->role)) {
            return redirect('/login');
        }

        return view('auth.reset-password');
    }

    public function userDetails(Request $request)
    {
        $token = $request->cookie('authToken');
        $tokenResult = JWToken::decodeToken($token);

        if ($tokenResult == 'unauthorized') {
            return redirect('/login');
        } else {

            $userId = $tokenResult->id;
            $user = User::find($userId);
            $userDetail = $user->userDetail;

            return response()->json([
                'status' => 'success',
                'message' => 'User details fetched successfully..!',
                'user' => $user,
                'userDetail' => $userDetail,
            ], 200);
        }
    }
}
