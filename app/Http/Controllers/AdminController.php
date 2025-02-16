<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserDetail;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function adminProfile()
    {
        return view('admin.profile');
    }

    public function allUsersPage()
    {
        return view('admin.all-users');
    }

    public function allUsers(Request $request)
    {
        try {
            $users = User::with('userDetail')->get(); // paginate(10);
            return response()->json([
                'status' => 'success',
                'message' => 'Users fetched successfully..!',
                'users' => $users,
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    public function addUser(Request $request){
        DB::beginTransaction();
        try {
            $request->validate([
                'first_name' => 'required|string',
                'last_name' => 'required|string',
                'username' => 'required|string|min:3|unique:users,username',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|string|min:8',
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
            return response()->json([
                'status' => 'success',
                'message' => 'New User Added Successfully..!',
            ], 200);
            
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    public function  editPermission(Request $request){
        $email = $request->header('email');

        // Only admin@email.com can change the permission
        if ($email !== 'admin@email.com') {
            return response()->json([
                'status' => 'error',
                'message' => 'You have no authorization to change the permission..!',
            ]);
        }
        $user = User::find($request->id);
        $user->update([
            'role' => $request->role, 
            'is_active' => $request->is_active
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Permission updated successfully..!',
        ], 200);
    } 
}
