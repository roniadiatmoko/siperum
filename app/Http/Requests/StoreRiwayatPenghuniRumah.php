<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRiwayatPenghuniRumah extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    
    public function rules()
    {
        return [
            'nama'        => 'required|string',
            'tanggal_menetap' => 'nullable|date',
            'shdk'            => 'required|string',
        ];
    }
    
    public function messages(): array
    {
        return [
            'nama.required'        => 'Nama wajib diisi',
            'shdk.required'        => 'Hubungan dalam keluarga wajib diisi'
        ];
    }
}