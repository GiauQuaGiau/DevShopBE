<?php
namespace App\Http\Controllers\app\Modules\Admin\Auth\Actions;

use App\Helpers\HttpStatusCodes;
use App\Modules\Admin\DTO\UserDTO;

class LoginAction {
    public function handle() {}

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
            return HttpStatusCodes::responseError(
                'loginFailed',
                HttpStatusCodes::INTERNAL_SERVER_ERROR,
                $th,
                __METHOD__
            );
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
                    'user' => UserDTO::current_user(auth()->user()),
                    'message' => 'loginSuccess',
                    'token' => "bearer $token",
                    'expires_in' => auth()->factory()->getTTL() * 60,
                    'code' => HttpStatusCodes::OK
                ];
            } else {
                $data = [
                    'status' => false,
                    'message' => 'UNAUTHORIZED',
                    'error' => "UNAUTHORIZED",
                ];
            }
            return response()->json($data, 200)
                             ->cookie(
                                'token',
                                $token,
                                auth()->factory()->getTTL()
                             );
        } catch (\Throwable $th) {
            return HttpStatusCodes::responseError(
                'loginFailed',
                HttpStatusCodes::INTERNAL_SERVER_ERROR,
                $th,
                __METHOD__
            );
        }
    }

}

