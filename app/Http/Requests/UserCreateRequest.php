<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserCreateRequest extends FormRequest
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
            'email' => 'unique:users|required',
            'password' => ['required', 'regex:/^(?=.*[A-Z])(?=.*[!@#$%^&*\'"])/', 'min:8', 'max:20', 'confirmed'],
        ];
    }

    public function messages()
    {
        return [
            'email.unique' => 'Email sudah digunakan',
            'email.required' => 'Email wajib diisi',
            'password.required' => 'Password wajib diisi',
            'password.regex' => 'Password harus mengandung setidaknya satu huruf besar dan satu simbol',
            'password.min' => 'Password harus memiliki panjang minimal 8 karakter',
            'password.max' => 'Password tidak boleh lebih dari 20 karakter',
            'password.confirmed' => 'Konfirmasi password tidak cocok',
        ];
    }
}
