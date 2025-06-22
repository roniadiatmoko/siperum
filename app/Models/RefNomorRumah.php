<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RefNomorRumah extends Model
{
    use HasFactory;

    protected $table = 'ref_nomor_rumah';
    protected $primaryKey = 'nomor_rumah';
    public $incrementing = false; //karena bukan auto increment
    public $timestamps = false;
    protected $fillable = ['nomor_rumah', 'is_aktif'];
    
    public function riwayatPenghuni(){
        return $this->hasMany(RiwayatPenghuni::class, 'nomor_rumah', 'nomor_rumah');
    }
}
