<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function userProfileUpadate(Request $request)
    {
        $user_id = $request->header('id');
        $user = User::find($user_id);
        $userDetail = $user->userDetail;

        if (!$user) {
            return response()->json([
                'status' => 'error',
                'message' => 'User not found..!',
            ], 404);
        } else {
            $first_name = $request->first_name;
            $last_name = $request->last_name;
            $contact = $request->contact;
            $alt_contact = $request->alt_contact;
            $emergency_contact = $request->emergency_contact;
            $address = $request->address;
            $userDetail->update([
                'first_name' => $first_name,
                'last_name' => $last_name,
                'contact' => $contact,
                'alt_contact' => $alt_contact,
                'emergency_contact' => $emergency_contact,
                'address' => $address,
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'Profile updated successfully..!',
            ], 200);
        }
    }

    public function userChangePassword(Request $request)
    {
        $userId = $request->header('id');
        $user = User::find($userId);
        if (!$user) {
            return response()->json([
                'status' => 'error',
                'message' => 'User not found..!',
            ], 404);
        } else {
            $request->validate([
                'password' => 'required|min:8',
            ]);

            $password = Hash::make($request->password);
            $user->update(['password' => $password]);
            return response()->json([
                'status' => 'success',
                'message' => 'Password updated successfully..!',
            ], 200);
        }
    }
}
