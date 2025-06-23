<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
        $isUpdate = $this->route('nomor_rumah');
        
        return [
            'nomor_rumah' => [
                'required',
                'string',
                Rule::unique('ref_nomor_rumah', 'nomor_rumah')
                    ->ignore($isUpdate, 'nomor_rumah'), // ini akan aktif hanya saat update
            ],
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
