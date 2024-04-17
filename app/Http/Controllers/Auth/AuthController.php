<?php

namespace App\Http\Controllers\Auth;

use App\Helpers\HttpStatusCodes;
use App\Http\Controllers\Auth\Actions\AuthAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function __construct() {
    }
    public function login(AuthRequest $request, AuthAction $authAction) {
        $typeAccount = isEmail($request->input('account')) ? 'email' : 'username'; //username || email

        $credentials = [
            $typeAccount => $request->input('account'),
            'password' => $request->input('password')
        ];

        if (!$token = auth()->attempt($credentials)) {
            $data = [
                'status' => false,
                'message' => 'Tên tài khoản hoặc mật khẩu không chính xác!',
                'error' => 'Unauthorized',
                'code' => HttpStatusCodes::UNAUTHORIZED,
            ];
            return response()->json($data, HttpStatusCodes::UNAUTHORIZED);
        }

        // return $this->respondWithToken($token);
        $data = [
            'status' => true,
            'user' => auth()->user(),
            'message' => 'Đăng nhập thành công',
            'token' => "bearer $token",
            'expires_in' => auth()->factory()->getTTL() * 60
        ];
        return response()->json($data, 200);
    }
}
