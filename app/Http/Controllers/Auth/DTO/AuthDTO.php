<?php
namespace App\Http\Controllers\Auth\DTO;

use Carbon\Carbon;

class AuthDTO {
    static function current_user($user) {
        return [
            'id' => $user->id,
            'firstname' => $user->firstname,
            'middlename' => $user->middlename,
            'lastname' => $user->lastname,
            'phone' => $user->phone,
            'avata' => $user->avata ? asset($user->avata) : null,
            'address' => $user->address,
            'gender' => $user->gender,
            'status' => $user->status,
            'username' => $user->username,
            'email' => $user->email,
            'role' => $user->role,
            // 'email_verified_at' => $user->email_verified_at ? $user->email_verified_at : null,
            // 'created_at' => Carbon::parse($user->created_at)->format('Y-m-d'),
            'created_at' => Carbon::parse($user->created_at)->format('Y-m-d'),
            // 'updated_at' => $user->updated_at,
            // 'deleted_at' => $user->deleted_at,
        ];
    }
}