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
    
    public function shdk()
    {
        return $this->belongsTo(RefShdk::class, 'status_hubungan_keluarga', 'id');
    }
    
    public function refAgama()
    {
        return $this->belongsTo(RefAgama::class, 'agama', 'id');
    }
    
    public function statusMarital(){
        return $this->belongsTo(RefMarital::class, 'status_marital', 'id');
    }
    
    public function pendidikanTerakhir(){
        return $this->belongsTo(RefPendidikan::class, 'pendidikan_terakhir', 'id');
    }
    
    public function refPekerjaan(){
        return $this->belongsTo(RefPekerjaan::class, 'pekerjaan', 'id');
    }
}
