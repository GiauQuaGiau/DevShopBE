<?php
namespace App\Modules\Admin\Auth\Actions;

use App\Helpers\HttpStatusCodes;
use App\Modules\Admin\Auth\DTO\UserDTO;

class LoginAction {
    public function handle() {}

    public function login($credentials, $remember = false)
    {
        try {
            if ($remember) {
                $token = auth('admin')->setTTL((int)env('JWT_TimeLifeRemember'))->attempt($credentials);
            } else {
                $token = auth('admin')->setTTL((int)env('JWT_TimeLifeDefault'))->attempt($credentials);
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
        $userDTO = new UserDTO();
        try {
            $data = [];
            if ($token) {
                $data = [
                    'status' => true,
                    'user' => $userDTO->dataLogin(auth()->user()),
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

