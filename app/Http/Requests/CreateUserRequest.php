<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;

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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'email' => [
                'required',
                'regex:/^[a-zA-Z]+[a-zA-Z0-9\-]*@([a-zA-Z0-9\-]+\.)+[a-zA-Z]{2,}$/ui',
                'unique:users'
            ],
            'password' => 'required|min:8|regex:/^[a-zA-Z]+[a-zA-Z0-9\-]*$/u',
        ];
    }

    /**
     * notification messages
     * @return array
     */
    public function messages(): array
    {
        return [
            'email.regex' => 'Email format is incorrect',
            'password.regex' => 'Passwords cannot contain spaces and should start with at least 1 letter',
        ];
    }
}
