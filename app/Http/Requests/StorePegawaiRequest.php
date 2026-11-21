<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePegawaiRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'nama' => ['required', 'string', 'max:100'],
            'jabatan' => ['required', 'string', 'max:100'],
            'email' => ['nullable', 'email', 'max:255', 'unique:pegawai,email'],
            'nomor_telepon' => ['nullable', 'string', 'max:25'],
            'alamat' => ['nullable', 'string', 'max:500'],
        ];
    }

    /**
     * Get the custom validation messages.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'nama.required' => 'Nama pegawai wajib diisi.',
            'nama.max' => 'Nama pegawai maksimal 100 karakter.',
            'jabatan.required' => 'Jabatan wajib diisi.',
            'jabatan.max' => 'Jabatan maksimal 100 karakter.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email ini sudah terdaftar untuk pegawai lain.',
            'nomor_telepon.max' => 'Nomor telepon maksimal 25 karakter.',
            'alamat.max' => 'Alamat maksimal 500 karakter.',
        ];
    }
}
