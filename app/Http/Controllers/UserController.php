<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function dashboard(Request $request){
        $userId = $request->header('id');
        $user = User::find($userId);
        return view('user.dashboard', ['user' => $user]);
    }

    public function userProfile(Request $request){
        // $userId = $request->header('id');
        // $user = User::find($userId);
        // $userDetail = $user->userDetail;

        return view('user.profile'); //, ['user' => $user, 'userDetail' => $userDetail]);
    }
}