<?php

namespace App\Helper;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class JWTToken {
    //Create Token
    public static function createToken($user_email, $user_id) {

        $key = env('JWT_kEY'); //env file teke JWT value ashce

        $payload = [
            'iss'        => 'Laravel Token',
            'iat'        => time(),
            'exp'        => time() + 3600 * 24,
            'user_email' => $user_email,
            'user_id'    => $user_id,
        ];

        // $token = JWT::encode($payload, $key, 'HS256');
        // return $token;

        return JWT::encode($payload, $key, 'HS256');

    }

    //Create Token for reset Password
    public static function createTokenForResetPassword($user_email) {

        $key = env('JWT_kEY'); //env file teke JWT value ashce
        $payload = [
            'iss'        => 'Laravel Token',
            'iat'        => time(),
            'exp'        => time() + 60 * 5,
            'user_email' => $user_email,
        ];

        return JWT::encode($payload, $key, 'HS256');

    }

    //verify Token
    public static function verifyToken($token) {
        try {
            if (!$token) {
                return 'invalid Token';
            } else {
                $key = env('JWT_kEY');
                $payload = JWT::decode($token, new Key($key, 'HS256'));
                return $payload;

                // return JWT::decode($jwt, new Key($key, 'HS256'));
            }
        } catch (\Throwable $error) {
            return 'invalid Token';
        }
    }
}
