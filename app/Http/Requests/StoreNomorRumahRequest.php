<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreNomorRumahRequest extends FormRequest
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
            'nomor_rumah' => 'required|string|unique:ref_nomor_rumah,nomor_rumah',
            'is_aktif' => 'required|in:0,1'
        ];
    }
    
    public function messages(): array
    {
        return [
            'nomor_rumah.required' => 'Nomor Rumah wajib diisi',
            'nomor_rumah.unique'   => 'Nomor rumah sudah ada',
            'is_aktif.required'    => 'Status rumah wajib diisi',
            'is_aktif.in'          => 'Status rumah harus Aktif atau Tidak Aktif',
        ];
    }
}
