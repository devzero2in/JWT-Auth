<?php

namespace App\Helper;

use Exception;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class JWToken
{
    public static function generateToken($id, $email, $role): string
    {
        $key = env('JWT_KEY');
        $payload = [
            'iss' => env('APP_NAME'),
            'iat' => time(),
            'id' => $id,
            'email' => $email,
            'role' => $role,
            'exp' => time() + 3600, // 1 hour
        ];
        $jwt = JWT::encode($payload, $key, 'HS256');
        return $jwt;
    }

    public static function createToken($email): string
    {
        $key = env('JWT_KEY');
        $payload = [
            'iss' => env('APP_NAME'),
            'iat' => time(),
            'email' => $email,
            // 'id'=>'0',
            'exp' => time() + 300, // 5 minutes
        ];
        $jwt = JWT::encode($payload, $key, 'HS256');
        return $jwt;
    }


    public static function decodeToken($token): string|object
    {
        try{
            if($token == null){
                return 'unauthorized';
            }else{
                $key = env('JWT_KEY');
                // $key = 'lara-jwt-auth-1234';
                $decode = JWT::decode($token, new Key($key, 'HS256'));
                return $decode;
            }
        }
        catch(Exception $e){
            // return 'Un-Authorized...'. $e->getMessage();
            return 'unauthorized';
            // return [
            //     'status' => 'error',
            //     'message' => 'Un-Authorized...' . $e
            // ];
        }
    }
}
