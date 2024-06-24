<?php

namespace App\Modules\Admin\DTO;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AuthStoreDTO extends JsonResource
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
    // public $role_ids;

    public function toArray($data = null)
    {
        if (!$data) {
            $data = new Request();
        }
        return new self([
            // 'email' => $request->input('email'),
            // 'name' => $request->input('name'),
            // 'first_name' => $request->input('first_name'),
            // 'last_name' => $request->input('last_name'),
            // 'gender' => $request->input('gender'),
            // 'password' => \Hash::make($request->input('password')),
            // 'status' => $request->input('status'),
            // 'role_ids' => $request->input('role_ids') ?: [],
        ]);
    }
}
