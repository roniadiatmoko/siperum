<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreWargaRequest extends FormRequest
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
            'nik' => [
                'required',
                'digits: 16',
                'regex:/^(?!([0-9])\1{15})[0-9]{16}$/',
                'unique:ref_warga,nik'
            ],
            'no_kk' => 'required|digits:16',
            'nama' => [
                'required'
            ],
            'shdk' => 'required',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'kewarganegaraan' => 'required'
        ];
    }
    
    public function messages(): array
    {
        return [
            'nik.required' => 'NIK wajib diisi',
            'nik.digits'   => 'NIK harus terdiri dari 16 digit angka',
            'nik.regex'    => 'NIK tidak boleh angka berulang',
            'nik.unique'   => 'NIK sudah pernah dimasukkan',
            
            'nama.required' => 'Nama wajib diisi',
            
            'shdk.required' => 'Status Dalam Keluarga harus diisi',
            'no_kk.required' => 'Nomor KK wajib diisi',
            'no_kk.digits'   => 'Nomor KK harus 16 digit angka',
            
            'jenis_kelamin.required' => 'Jenis kelamin wajib diisi',
            'agama.required' => 'Agama wajib diisi',
            'kewarganegaraan.required' => 'Kewarganegaraan wajib diisi'
        ];
    }
}
