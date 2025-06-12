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
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8',
            'role' => 'required|integer'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Поле обязательно для заполнения',
            'name.string' => 'Поле должно быть строкой',
            'email.required' => 'Поле обязательно для заполнения',
            'email.email' => 'Поле должно быть email',
            'email.unique' => 'Пользователь с таким email уже существует',
            'password.required' => 'Поле обязательно для заполнения',
            'password.string' => 'Поле должно быть строкой',
            'password.min' => 'Поле должно быть не менее 8 символов',
            'role.required' => 'Поле обязательно для заполнения',
            'role.integer' => 'Поле должно быть числом',
        ];
    }
}
