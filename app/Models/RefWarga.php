<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RefWarga extends Model
{
    use HasFactory;
    
    protected $table = 'ref_warga';
    
    protected $fillable = [
        'nama',
        'nik',
        'no_kk',
        'status_hubungan_keluarga',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'asal_sebelumnya',
        'agama',
        'status_marital',
        'kewarganegaraan',
        'pendidikan_terakhir',
        'pekerjaan',
        'email',
        'no_hp',
        'foto_ktp_path',
        'alamat',
        'is_aktif'
    ];
}
