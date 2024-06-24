<?php
namespace App\Modules\Admin\Requests;
use Illuminate\Foundation\Http\FormRequest;
use App\Modules\Admin\DTO\AuthStoreDTO;


class ExampleRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            // 'email' => 'required|email|unique:users,email',
            // 'name' => 'required|unique:users,name',
            // 'first_name' => 'required',
            // 'last_name' => 'required',
            // 'gender' => 'required|in:MALE,FEMALE',
            // 'password' => 'required|min:6',
            // 'confirm_password' => 'required|same:password',
            // 'status' => 'required|in:AC,IA',
            // 'role_ids' => 'nullable|array',
            // 'role_ids.*' => 'nullable|integer'
        ];
    }

    public function toDTO()
    {
        return AuthStoreDTO::fromRequest();
    }

}
