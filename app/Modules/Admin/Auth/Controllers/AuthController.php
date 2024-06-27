<?php

namespace App\Modules\Admin\Auth\Controllers;

use App\Helpers\HttpStatusCodes;
use App\Modules\Admin\Auth\Actions\LoginAction;
use App\Http\Controllers\Controller;
use App\Modules\Admin\Auth\Requests\AuthRequest;
// use Illuminate\Http\Request;

class AuthController extends Controller
{
    //
    public function __construct() {
        // dd('AuthController');
    }
    public function login(AuthRequest $request, LoginAction $loginAction)
    {
        try {
            $typeAccount = isEmail($request->input('account')) ? 'email' : 'username'; //username || email
            $credentials = [
                $typeAccount => $request->input('account'),
                'password' => $request->input('password')
            ];
            $remember = $request->input('remember');
            // dd($credentials);
            return $response = $loginAction->login($credentials, $remember);
        } catch (\Throwable $th) {
            return HttpStatusCodes::responseError(
                'loginFailed',
                HttpStatusCodes::INTERNAL_SERVER_ERROR,
                $th,
                __METHOD__
            );
        }
    }

    public function logout()
    {
        auth()->logout(true);
        return response()->json([
            'status' => true,
            'message' => 'Đăng xuất thành công'
        ]);
    }
}
