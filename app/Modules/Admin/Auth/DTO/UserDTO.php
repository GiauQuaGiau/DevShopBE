<?php

namespace App\Modules\Admin\DTO;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserDTO extends JsonResource
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
    // public $password;
    // public $status;
    public $account;
    public $password;
    public $remember;

    public function toArray($data = null)
    {
        if (!$data) {
            $data = new Request();
        }
        return new self([
            'id' => $data->id,
            'firstname' => $data->firstname,
            'middlename' => $data->middlename,
            'lastname' => $data->lastname,
            'phone' => $data->phone,
            'avata' => $data->avata ? asset($data->avata) : null,
            'address' => $data->address,
            'gender' => $data->gender,
            'status' => $data->status,
            'username' => $data->username,
            'email' => $data->email,
            'role' => $data->role,
            'lang' => $data->lang,
            // 'email_verified_at' => $data->email_verified_at ? $data->email_verified_at : null,
            // 'created_at' => Carbon::parse($data->created_at)->format('Y-m-d'),
            'created_at' => Carbon::parse($data->created_at)->format('Y-m-d'),
        ]);
    }
}
