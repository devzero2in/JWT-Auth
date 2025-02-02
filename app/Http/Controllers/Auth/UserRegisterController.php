<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\NotifyNewUser;
use App\Mail\UserRegisterMail;
use App\Models\User;
use App\Models\UserDetail;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class UserRegisterController extends Controller
{

    public function register(Request $request){
        DB::beginTransaction();
        try {
            $request->validate([
                'username' => 'required|max:100|min:3|string|unique:users,username',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:6',
            ]);

            $user = User::create([
                'username' => $request->username,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            $user_id = $user->id;
            UserDetail::create([
                'user_id' => $user_id,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
            ]);

            DB::commit();

            $admin = User::where('email', 'admin@email.com')->where('role', 'admin')->first();

            //send an email to the user
            Mail::to($user->email)->send(new UserRegisterMail($user));

            // send an email to the admin
            Mail::to($admin->email)->send(new NotifyNewUser($user));

            // log the activity
            Log::info('New User registered successfully..!'. $user->email . ' - ' . $user->username);

            return response([
                'user' => $user,
                'status' => 'success',
                'message' => 'User created successfully..!',
            ], 200);
        }
        catch (Exception $e) {
            DB::rollBack();
            return response([
                'status' => 'error',
                'message' => $e->getMessage(),
            ], 500);
        }
    }
}
