<?php

namespace App\Http\Controllers\User;

use App\Helpers\HttpStatusCodes;
use App\Http\Controllers\Controller;
use App\Http\Controllers\User\Actions\UserAction;
use App\Http\Resources\AdminUserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getUserList(Request $request, UserAction $userAction)
    {

        try {
            return $userAction->search($request->input());
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
