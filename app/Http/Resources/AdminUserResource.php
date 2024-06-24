<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AdminUserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            // 'firstname' => $this->firstname,
            // 'middlename' => $this->middlename,
            // 'lastname' => $this->lastname,
            'name' => $this->lastname . ' ' .$this->firstname,
            'phone' => $this->phone,
            // 'avata' => $this->avata ? asset($this->avata) : null,
            'address' => $this->address,
            'gender' => $this->gender,
            'status' => $this->status,
            'username' => $this->username,
            'email' => $this->email,
            'role' => $this->role,
            'created_at' => Carbon::parse($this->created_at)->format('Y-m-d'),
        ];
    }
}
