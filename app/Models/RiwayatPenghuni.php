<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatPenghuni extends Model
{
    use HasFactory;
    protected $table = 'riwayat_penghuni';
    protected $fillable = ['nomor_rumah', 'nama', 'is_aktif', 'tanggal_menetap', 'shdk'];
    
    public function rumah(){
        return $this->belongsTo(RefNomorRumah::class, 'nomor_rumah', 'nomor_rumah');
    }
}
