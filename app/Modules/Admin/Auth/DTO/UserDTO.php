<?php

namespace App\Modules\Admin\Auth\DTO;

use Carbon\Carbon;
use Illuminate\Http\Request;

class UserDTO
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */

    // public $email;
    // public $name;
    // public $first_name;
    // public $last_name;
    // public $gender;
    // public $status;
    // public $account;
    // public $password;
    // public $remember;

    public function dataLogin($data = null)
    {
        // if (!$data) {
        //     $data = new Request();
        // }
        // dd($data->firstname);
        return ([
            'id' => $data->id ?: null,
            'firstname' => $data->firstname ?: null,
            'middlename' => $data->middlename ?: null,
            'lastname' => $data->lastname ?: null,
            'phone' => $data->phone ?: null,
            'avata' => $data->avata ? asset($data->avata) : null,
            'address' => $data->address ?: null,
            'gender' => $data->gender ?: null,
            'status' => $data->status ?: null,
            'username' => $data->username ?: null,
            'email' => $data->email ?: null,
            'role' => $data->role ?: null,
            'lang' => $data->lang ?: null,
            // 'email_verified_at' => $data->email_verified_at ? $data->email_verified_at : null,
            // 'created_at' => Carbon::parse($data->created_at)->format('Y-m-d'),
            'created_at' => Carbon::parse($data->created_at)->format('Y-m-d'),
        ]);
    }
}
