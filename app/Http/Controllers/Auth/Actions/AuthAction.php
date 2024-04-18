<?php

namespace App\Http\Controllers\Auth\Actions;

use App\Helpers\HttpStatusCodes;
use App\Http\Controllers\Auth\DTO\AuthDTO;
use App\Models\User;
use Illuminate\Http\Request;

class AuthAction extends User
{
    public function login($credentials, $remember = false)
    {



        try {
            if ($remember) {
                $token = auth()->setTTL(env('JWT_TimeLifeRemember'))->attempt($credentials);
            } else {
                $token = auth()->setTTL(env('JWT_TimeLifeDefault'))->attempt($credentials);
            }
            return $this->createResponse($token);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => 'Có xẩy ra lỗi khi đăng nhập',
                'code' => HttpStatusCodes::INTERNAL_SERVER_ERROR,
                'error' => __METHOD__ . ": " . $th->getMessage()
            ], 200);
        }
    }

    public function createResponse($token)
    {


        try {
            $data = [];
            // dd($token);
            if ($token) {
                $data = [
                    'status' => true,
                    'user' => AuthDTO::current_user(auth()->user()),
                    'message' => 'Đăng nhập thành công',
                    'token' => "bearer $token",
                    'expires_in' => auth()->factory()->getTTL() * 60,
                    'code' => HttpStatusCodes::OK
                ];
            } else {
                $data = [
                    'status' => false,
                    'message' => 'Tên tài khoản hoặc mật khẩu không chính xác',
                    'error' => "UNAUTHORIZED",
                ];
            }
            return $data;
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => 'Có xẩy ra lỗi khi đăng nhập',
                'code' => HttpStatusCodes::INTERNAL_SERVER_ERROR,
                'error' => __METHOD__ . ": " . $th->getMessage()
            ], 200);
        }
    }
}
