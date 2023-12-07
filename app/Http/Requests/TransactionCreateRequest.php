<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TransactionCreateRequest extends FormRequest
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
        return[
            'nama_lengkap' => 'required|string|min:5',
            'no_telp' => 'required|string|regex:/^62\d{10,}$/',
            'email' => 'required|email',
            'nomor_ktp' => 'required|numeric|digits:16',
            'payment_method' => 'required',
            'agreement_tnc' => 'accepted'
        ];
    }

    public function messages()
    {
        return [
            'nama_lengkap.required' => 'Silakan isi nama lengkap kamu',
            'nama_lengkap.min' => 'Nama lengkap harus minimal 5 karakter',
            'no_telp.required' => 'Nomor ponsel tidak boleh kosong',
            'no_telp.regex' => 'Nomor ponsel harus dimulai dengan 62 dan minimal 10 digit',
            'email.required' => 'Alamat email tidak boleh kosong',
            'email.email' => 'Format email tidak valid',
            'nomor_ktp.required' => 'Nomor KTP tidak boleh kosong',
            'nomor_ktp.numeric' => 'Nomor KTP harus terdiri dari 16 digit angka',
            'nomor_ktp.digits' => 'Nomor KTP harus terdiri dari 16 digit angka',
            'payment_method.required' => 'Pilih metode pembayaran terlebih dahulu',
            'agreement_tnc.accepted' => 'Syarat dan ketentuan harus disetujui',
        ];
    }
}
