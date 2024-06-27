<?php

namespace App\Modules\Admin\User\Actions;

use App\Models\User;
use App\Modules\Admin\User\Resources\UserResource;

class UserAction
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
        // dd();
        if ($gender = array_get($input, 'gender')) {
            // if (array_get($input, 'gender') == 'male') {
            //     $value = 0;
            // }
            // if (array_get($input, 'gender') == 'female') {
            //     $value = 1;
            // }
            $query->where('gender', $gender);
        }
        if ($keyword = array_get($input, 'email')) {
            $query->where('email', $keyword);
        }
        if ($keyword = array_get($input, 'username')) {
            $query->where('username', $keyword);
        }
        if ($status = array_get($input, 'status')) {
            // if (array_get($input, 'status') == 'inactive') {
            //     $value = 0;
            // }
            // if (array_get($input, 'status') == 'active') {
            //     $value = 1;
            // }
            $query->where('status', $status);
        }
        // export
        if (array_get($input, 'export') && array_get($input, 'export') == 1) {
            return $this->exportUserList($query->get());
        }
        if (array_get($input, 'sort')) {
            $column = array_key_first(array_get($input, 'sort'));
            $value = array_get($input, 'sort')[$column];
            $query->orderBy($column, $value);
        } else {
            $query->orderBy('created_at', 'DESC');
        }
        $limit = 10;
        if (array_get($input, 'limit')) {
            $limit = array_get($input, 'limit');
        }

        // return response()->json($query->paginate($limit));
        $listUsers = $query->paginate($limit);
        $data = [
            'status' => true,
            'users' => UserResource::collection($listUsers),
            'meta' => [
                'current_page' => $listUsers->currentPage(),
                'from_item' => $listUsers->firstItem(),
                'to_item' => $listUsers->lastItem(),
                'items_in_page' => $listUsers->perPage(),
                'total_items' => $listUsers->total(),
                'totalPage' => ceil($listUsers->total() / $listUsers->perPage()),
            ],
        ];
        return response()->json($data);
    }

    public function exportUserList($data)
    {
        return response()->json(['message' => 'export user list']);
    }
}
