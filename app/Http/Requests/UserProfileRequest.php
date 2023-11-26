<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserProfileRequest extends FormRequest
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
            // 'pfp' => 'required',
            'firstName' => 'required|min:2',
            'lastName' => 'required|max:255',
            'noTelp' => 'required|regex:/(62)[0-9]{9}/',
            'gender' => 'required',
            'dob' => 'required|date|required',
        ];
    }

    public function messages()
    {
        return [
            // 'pfp.required' => 'Gambar wajib diunggah',
            'firstName.min' => 'Nama depan minimal harus terdiri dari 2 karakter',
            'firstName.required' => 'Nama depan wajib diisi',
            'lastName.max' => 'Nama belakang tidak boleh lebih dari 255 karakter',
            'lastName.required' => 'Nama belakang wajib diisi',
            'noTelp.required' => 'Nomor telepon wajib diisi',
            'noTelp.regex' => 'Nomor telepon harus dimulai dengan "62" dan memiliki total 11 digit angka.',
            'gender.required' => 'Jenis kelamin wajib dipilih',
            'dob.date' => 'Format tanggal lahir tidak valid',
            'dob.required' => 'Tanggal lahir wajib diisi',
        ];
    }
}
