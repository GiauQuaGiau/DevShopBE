<?php

namespace App\Http\Controllers\User;

use App\Helpers\HttpStatusCodes;
use App\Http\Controllers\Controller;
use App\Http\Controllers\User\Actions\UserAction;
use App\Http\Requests\CreateUserRequest;
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

    public function createUser(CreateUserRequest $request)
    {
        try {
            $input = $request->input();
            $input['gender'] = $input['gender'] == 'male' ? 0 : 1;
            $input['status'] = $input['status'] == 'inactive' ? 0 : 1;
            $user = User::create($input);
            if ($user) {
                $data = [
                    'message' => 'SuccessfullyToCreateUser',
                    'status' => true
                ];
            } else {
                $data = [
                    'message' => 'failedToCreateUser',
                    'status' => true
                ];
            }
            return response()->json($data);
        } catch (\Throwable $th) {
            return HttpStatusCodes::responseError(
                'CouldNotCreateUser',
                HttpStatusCodes::INTERNAL_SERVER_ERROR,
                $th,
                __METHOD__
            );
        }
    }
}
