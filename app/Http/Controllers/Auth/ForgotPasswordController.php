<?php

namespace App\Http\Controllers\Auth;

use App\Helper\JWToken;
use App\Http\Controllers\Controller;
use App\Mail\OTPMail;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class ForgotPasswordController extends Controller
{
    public function sendOTP(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $user = User::where('email', $request->email)->first();

        if ($user) {
            if ($user->is_active === 1) {
                // generate a 6 digit OTP
                $otp = rand(100000, 999999);

                // update the OTP in the database
                $user->update(['otp' => $otp]);

                //send an email to the user with the OTP
                Mail::to($user->email)->send(new OTPMail($otp));

                return response([
                    'status' => 'success',
                    'message' => 'OTP sent successfully..!',
                ], 200);
            } else {
                return response([
                    'status' => 'error',
                    'message' => 'User is not active..!',
                ]);
            }
        } else {
            return response([
                'status' => 'error',
                'message' => 'User not found..!',
            ]);
        }
    }

    public function verifyOTP(Request $request)
    {
        try {
            $request->validate([
                'otp' => 'required|min:6|max:6',
            ]);

            $email = $request->email;
            $otp = $request->otp;

            $user = User::where('email', $email)->where('otp', $otp)->where('is_active', 1)->first();

            if($user){
                $expOtp = $user->updated_at->addMinutes(5);

                if($expOtp > now()){
                    $user->update(['otp' => null]);

                    // Issue auth token
                    // $authToken = JWToken::generateToken($user->id, $user->email, $user->role);
                    $authToken = JWToken::createToken($user->email);

                    return response()->json([
                        'user' => $user,
                        'status' => 'success',
                        'message' => 'OTP verified successfully..!',
                        'authToken' => $authToken
                    ], 200)->cookie('authToken', $authToken, 60*5); //5 minutes
                    
                }else{
                    return response([
                        'status' => 'error',
                        'message' => 'OTP expired..! please try again',
                    ]);
                }
            }else{
                return response([
                    'status' => 'error',
                    'message' => 'User not found or inactive..!',
                ]);
            }

            // if ($user->otp !== $otp) {
            //     return response([
            //         'status' => 'error',
            //         'message' => 'Invalid OTP..!',
            //     ], 500);
            // } else {
            //     // Update user otp in database
            //     User::where('email', $email)->update(['otp' => null]);

            //     // Issue auth token
            //     $authToken = JWToken::createToken($user->email);

            //     // Return response
            //     return response([
            //         'status' => 'success',
            //         'message' => 'OTP verified successfully..!',
            //     ], 200)->cookie('authToken', $authToken, 300);
            // }
        } catch (Exception $e) {
            return response([
                'status' => 'error',
                'message' => 'Un-authorized user..!',
            ], 500);
        }
    }

    public function resetPassword(Request $request)
    {
        try {
            $request->validate([
                'password' => 'required|min:6',
            ]);

            $email = $request->header('email');
            $password = Hash::make($request->password);

            $user = User::where('email', $email)->first();

            if($user){
                $user->update(['password' => $password]);

                return response([
                    'status' => 'success',
                    'message' => 'User password reset successfully..!',
                ], 200)->cookie('authToken', '', -1);
            }else{
                return response([
                    'status' => 'error',
                    'message' => 'User not found or inactive..!',
                ]);
            }
        } catch (Exception $e) {
            return response([
                'status' => 'error',
                'message' => 'Un-authorized user..!',
            ]);
        }
    }
}
