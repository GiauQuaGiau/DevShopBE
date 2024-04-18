<?php

namespace App\Http\Controllers\Auth;

use App\Helpers\HttpStatusCodes;
use App\Http\Controllers\Auth\Actions\AuthAction;
use App\Http\Controllers\Auth\DTO\AuthDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;
use App\Http\Resources\AuthResource;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function __construct()
    {
    }
    public function login(AuthRequest $request, AuthAction $authAction)
    {
        try {
            $typeAccount = isEmail($request->input('account')) ? 'email' : 'username'; //username || email
            $credentials = [
                $typeAccount => $request->input('account'),
                'password' => $request->input('password')
            ];
            $remember = $request->input('remember');

            $response = $authAction->login($credentials, $remember);
            return response()->json($response, 200);
            
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => 'Có xẩy ra lỗi khi đăng nhập',
                'code' => HttpStatusCodes::INTERNAL_SERVER_ERROR,
                'error' => $th->getMessage()
            ], 200);
        }
    }

    public function logout()
    {
        auth()->logout(true);
    }
}
