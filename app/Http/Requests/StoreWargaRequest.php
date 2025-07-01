<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreWargaRequest extends FormRequest
{
    
    // protected function failedValidation(Validator $validator)
    // {
    //     dd($validator->errors()->toArray(), $validator->failed());
    // }
    
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
                Rule::unique('ref_warga', 'nik')
                    ->ignore($this->route('daftar_warga')),
            ],
            'no_kk' => 'required|digits:16',
            'nama' => [
                'required'
            ],
            'status_hubungan_keluarga' => 'required',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'kewarganegaraan' => 'required',
            'foto_ktp_path' => 'image|mimes:jpg,jpeg,png|max:2048', //max 2mb
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
            
            'status_hubungan_keluarga.required' => 'Status Dalam Keluarga harus diisi',
            'no_kk.required' => 'Nomor KK wajib diisi',
            'no_kk.digits'   => 'Nomor KK harus 16 digit angka',
            
            'jenis_kelamin.required' => 'Jenis kelamin wajib diisi',
            'agama.required' => 'Agama wajib diisi',
            'kewarganegaraan.required' => 'Kewarganegaraan wajib diisi'
        ];
    }
}
