<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'required|email|max:50|unique:users',
            'username' => 'required|string|max:50',
            'password' => 'required|confirmed|max:60',
            'name' => 'required|string|max:50',
            'nick_name' => 'string|max:20',
            'birth_date' => 'required|date',
            'gender' => 'in:0,1', // 0 - male, 1 female
            'zip_code' => 'required|string|max:8',
            'address' => 'string|min:4|max:100',
            'tel' => 'string|size:11'
        ];
    }
}
