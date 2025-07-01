<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatPenghuni extends Model
{
    use HasFactory;
    protected $table = 'riwayat_penghuni';
    protected $fillable = ['nomor_rumah', 'id_warga', 'is_aktif', 'tanggal_menetap'];
    
    public function rumah(){
        return $this->belongsTo(RefNomorRumah::class, 'nomor_rumah', 'nomor_rumah');
    }
    
    public function warga(){
        return $this->belongsTo(RefWarga::class, 'id_warga', 'id');
    }
    
    public function getShdkLabelAttribute(){
        return self::shdkOptions($this->shdk) ?? '-';
    }
    
    public static function getPenghuni($nomorRumah)
    {
        $penghuni = self::where('nomor_rumah', $nomorRumah)
                    ->orderBy('shdk')
                    ->get();
        
        //jika tidak ada penghuni, return null atau tanda strip
        if($penghuni->isEmpty()){
            return '-';
        }
        
        //cari kepala rumah is aktif=1
        $kepala = $penghuni->firstWhere('is_aktif', 1);
        
        //Jika tidak ada kepala rumah, ambil anggota teratas berdasarkan SHDK
        if(!$kepala){
            $kepala = $penghuni->first();
        }
        
        //Hitung total penghuni lain selain kepala
        $totalLainnya = $penghuni->count()-1;
        
        //format label
        $label = $kepala->nama;
        
        if($totalLainnya > 0){
            $label .= " (+$totalLainnya lainnya)";
        }
        
        return $label;
    }
}
