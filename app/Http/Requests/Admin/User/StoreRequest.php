<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'role' => 'required|integer',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'This field is required',
            'name.string' => 'This field should be a string',
            'email.required' => 'This field is required',
            'email.string' => 'This field should be a string',
            'email.email' => 'Your email should be in format mail@some.domain',
            'email.unique' => 'User with this email already exist',
        ];
    }
}
