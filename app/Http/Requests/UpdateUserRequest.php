<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
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
            'password' => 'required|string|min:8|regex:/^[a-zA-Z]+[a-zA-Z0-9\-]*$/u',
            'email' => [
                'required',
                'regex:/^[a-zA-Z]+[a-zA-Z0-9\-]*@([a-zA-Z0-9\-]+\.)+[a-zA-Z]{2,}$/ui',
                Rule::unique('users')->ignore($this->user()->id, 'id')
            ],
            'name' => 'required|string',
        ];
    }
}
