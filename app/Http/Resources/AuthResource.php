<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AuthResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            // 'id' => $this->id,
            // 'firstname' => $this->firstname,
            // 'middlename' => $this->middlename,
            // 'lastname' => $this->lastname,
            // 'phone' => $this->phone,
            // 'avata' => $this->avata ? asset($this->avata) : null,
            // 'address' => $this->address,
            // 'gender' => $this->gender,
            // 'status' => $this->status,
            // 'username' => $this->username,
            // 'email' => $this->email,
            // 'role' => $this->role,
            // // 'email_verified_at' => $this->email_verified_at ? $this->email_verified_at : null,
            // // 'created_at' => Carbon::parse($this->created_at)->format('Y-m-d'),
            // 'created_at' => Carbon::createFromFormat('d/m/Y', $this->created_at)->format('Y-m-d'),
            // // 'updated_at' => $this->updated_at,
            // // 'deleted_at' => $this->deleted_at,
        ];
    }
}
// Carbon::parse($request->stockupdate)->format('Y-m-d');