<?php

namespace App\Modules\Admin\Auth\DTO;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LoginDTO extends JsonResource
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
            'account' => $data->input('account'),
            'password' => $data->input('password'),
            'remember' => $data->input('remember') && false,
        ]);
    }
}
