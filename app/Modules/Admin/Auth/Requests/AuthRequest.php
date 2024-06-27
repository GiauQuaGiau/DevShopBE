<?php

namespace App\Modules\Admin\Auth\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Modules\Admin\Auth\DTO\AuthStoreDTO;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class AuthRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'account' => 'required',
            'password' => 'required|min:6',
        ];
    }
    public function messages(): array
    {
        return [
            'account.required' => 'Tài khoản không được bỏ trống!',
            'password.required' => 'Mật khẩu không được bỏ trống!',
            'password.min' => 'Mật khẩu phải lớn hơn :min ký tự!',
        ];
    }
    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'status' => false,
            'message' => 'Dữ liệu không đúng định dạng',
            'data' => $validator->errors(),
        ], 422));
    }

    public function toDTO()
    {
        return AuthStoreDTO::fromRequest();
    }
}
