<?php

namespace App\Http\Controllers\User\Actions;

use App\Helpers\HttpStatusCodes;
use App\Http\Resources\AdminUserResource;
use App\Models\User;

class UserAction extends User
{
    public function search($request)
    {
        $input = removeNullOrEmptyString($request);
        $query = User::select('*');
        if ($keyword = array_get($input, 'name')) {
            // $query->where('firstname', 'like', "%$keyword%");
            // $query->orWhere('middlename', 'like', "%$keyword%");
            // $query->orWhere('lastname', 'like', "%$keyword%");
            $query->where(function ($query) use ($keyword) {
                $query->where('firstname', 'like', "%$keyword%")
                    ->orWhere('middlename', 'like', "%$keyword%")
                    ->orWhere('lastname', 'like', "%$keyword%");
            });
        }
        if ($keyword = array_get($input, 'role')) {
            $query->where('role', $keyword);
        }
        if ($keyword = array_get($input, 'phone')) {
            $query->where('phone', $keyword);
        }
        if ($keyword = array_get($input, 'address')) {
            $query->where('address', $keyword);
        }
        if ($keyword = array_get($input, 'gender')) {
            $query->where('gender', $keyword);
        }
        if ($keyword = array_get($input, 'email')) {
            $query->where('email', $keyword);
        }
        if ($keyword = array_get($input, 'username')) {
            $query->where('username', $keyword);
        }
        if ($keyword = array_get($input, 'status')) {
            $query->where('status', $keyword);
        }
        // export
        if (array_get($input, 'export') && array_get($input, 'export') == 1) {
            return $this->exportUserList($query->get());
        }

        $data = [
            'status' => true,
            'users' => AdminUserResource::collection($query->get())
        ];
        return response()->json($data);
    }
    
    public function exportUserList($data)
    {
        return response()->json(['message' => 'export user list']);
    }
}
