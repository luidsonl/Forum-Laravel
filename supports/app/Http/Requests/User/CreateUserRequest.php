<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'string',
                'min:3',
            ],
            'email' => [
                'required',
                'email',
                'unique:users'
            ],
            'password' => [
                'required',
                'min:6'
            ],
        ];
    }
    public function withValidator($validator){
        $validator->after(function ($validator) {
            if ($this->input('password') !== $this->input('confirm_password')) {
                $validator->errors()->add('confirm_password', 'A confirmação de senha não coincide com a senha digitada.');
            }
        });
    }

}
