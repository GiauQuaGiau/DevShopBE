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

            return $response = $authAction->login($credentials, $remember);
            // return response()->json($response, 200);
        } catch (\Throwable $th) {
            return HttpStatusCodes::responseError(
                'errorLogin',
                HttpStatusCodes::INTERNAL_SERVER_ERROR,
                $th,
                __METHOD__
            );
        }
    }

    public function logout()
    {
        return response()->json([
            'status' => auth()->logout(true),
            'message' => 'Đăng xuất thành công'
        ]);
    }

    
}
