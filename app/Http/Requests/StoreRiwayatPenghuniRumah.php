<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class StoreRiwayatPenghuniRumah extends FormRequest
{
    // protected function failedValidation(Validator $validator)
    // {
    //     dd($validator->errors()->toArray(), $validator->failed());
    // }
    
    public function authorize()
    {
        return true;
    }
    
    public function rules()
    {
        return [
            'id_warga'        => 'required',
            'tanggal_menetap' => 'nullable|date',
            // 'nomor_rumah'     => 'required|string',
        ];
    }
    
    public function messages(): array
    {
        return [
            'id_warga.required'        => 'Nama Warga wajib diisi',
            // 'nomor_rumah.required'     => 'Nomor Rumah wajib diisi'
        ];
    }
}