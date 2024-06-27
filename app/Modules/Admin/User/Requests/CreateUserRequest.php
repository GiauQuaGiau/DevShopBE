<?php
namespace App\Modules\Admin\User\Requests;
use Illuminate\Foundation\Http\FormRequest;
// use App\Modules\Admin\Auth\DTO\AuthStoreDTO;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class CreateUserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'firstname' => 'required',
            'lastname' => 'required',
            'password' => 'required|min:6|confirmed',
            'email' => 'required|email|unique:users,email',
            'username' => 'required|unique:users,username',
            'phone' => ['required', 'regex:/^(0|\+84)\d{9,10}$/'],
            'address' => 'required',
            'role' => 'required',
            'gender' => 'required',
            'status' => 'required',
        ];
    }
    public function messages(): array
    {
        return [
            'firstname.required' => 'FnameNotEmpty',
            'lastname.required' => 'LnameNotEmpty',
            'email.required' => 'emailNotEmpty',
            'username.required' => 'userNameNotEmpty',
            'phone.required' => 'phoneNotEmpty',
            'address.required' => 'addressNotEmpty',
            'role.required' => 'roleNotEmpty',
            'gender.required' => 'genderNotEmpty',
            'status.required' => 'statusNotEmpty',
            'password.required' => 'passwordNotEmpty',

            //
            'email.email' => 'formatEmail',
            'phone.regex' => 'formatPhone',
            //
            'email.unique' => 'EmailDuplicate',
            'username.unique' => 'UsernameDuplicate',
            //
            'password.confirmed' => 'confirmPassNotMatch',
        ];
    }
    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'status' => false,
            'message' => 'Data is not in correct format',
            'error' => 'validateFail',
            'data' => $validator->errors(),
        ], 422));
    }

    // public function toDTO()
    // {
    //     return AuthStoreDTO::fromRequest();
    // }

}
