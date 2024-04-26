<?php

namespace App\Http\Controllers\User;

use App\Helpers\HttpStatusCodes;
use App\Http\Controllers\Controller;
use App\Http\Resources\AdminUserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getUserList(Request $request)
    {

        try {
            $users = User::all();
            $data = [
                'status' => true,
                'users' => AdminUserResource::collection($users)
            ];
            return response()->json($data);
        } catch (\Throwable $th) {
            return HttpStatusCodes::responseError(
                'CouldNotGetUserList',
                HttpStatusCodes::INTERNAL_SERVER_ERROR,
                $th,
                __METHOD__
            );
        }
    }
}
