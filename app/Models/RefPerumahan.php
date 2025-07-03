<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RefPerumahan extends Model
{
    use HasFactory;
    
    protected $table = 'ref_perumahan';
    protected $fillable = ['nama', 'alamat_jalan', 'kode_kelurahan', 'kode_kecamatan', 'kode_kabupaten', 'kode_provinsi', 'is_aktif'];
}
