<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

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

    public function uploadAvatar(Request $request)
    {
        $userId = $request->header('id');
        $user = User::find($userId);
        $userDetail = $user->userDetail;

        if (!$user) {
            return response()->json([
                'status' => 'error',
                'message' => 'User not found..!',
            ], 404);
        } else {
            $request->validate([
                'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            if ($request->hasFile('avatar')) {
                // Delete the old avatar file
                if ($userDetail->avatar) {
                    Storage::disk('public')->delete($userDetail->avatar);
                }

                $path = $request->file('avatar')->store('images/avatars', 'public');
                $userDetail->update(['avatar' => $path]);

                return response()->json([
                    'status' => 'success',
                    'message' => 'Avatar updated successfully..!',
                    'avatar' => asset(Storage::url($path))
                ], 200);
            }else{
                return response()->json([
                    'status' => 'error',
                    'message' => 'Avatar not found..!',
                ]);
            }
        }
    }
}
