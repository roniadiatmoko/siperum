<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRiwayatPenghuniRumah;
use App\Models\RiwayatPenghuni;
use Illuminate\Http\Request;

class RiwayatPenghuniController extends Controller
{
    public function create(Request $request){
        return view('riwayat-penghuni.create');
    }
    
    
    public function store(StoreRiwayatPenghuniRumah $request){        
        RiwayatPenghuni::create([
            'nomor_rumah' => $request->nomor_rumah,
            'nama' => $request->nama,
            'tanggal_menetap' => $request->tanggal_masuk,
            'shdk' => $request->shdk
        ]);
        
        return redirect()->route('nomor-rumah.show', $request->nomor_rumah)->with('success', 'Penghuni Ditambahkan');
    }
    
    public function edit($id){
        $riwayat = RiwayatPenghuni::findOrFail($id);
        
        return view('riwayat-penghuni.edit', compact('riwayat'));
    }
    
    public function update(StoreRiwayatPenghuniRumah $request, $id){
        $riwayat = RiwayatPenghuni::findOrFail($id);
        
        $riwayat->update([
            'nama' => $request->nama,
            'tanggal_menetap' => $request->tanggal_masuk,
            'shdk' => $request->shdk
        ]);
        
        return redirect()->route('nomor-rumah.show', $riwayat->nomor_rumah)->with('success', 'Berhasil diperbarui');
    }
    
    public function jadikanKepala($id){
        $penghuni = RiwayatPenghuni::findOrFail($id);
        
        RiwayatPenghuni::where('nomor_rumah', $penghuni->nomor_rumah)
                        ->update(['is_aktif' => 0]);
        
        $penghuni->update(['is_aktif' => 1]);
        
        return redirect()->back()->with('success', 'Penghuni dijadikan kepala rumah');
    }
    
    public function destroy($id){
        $riwayat = RiwayatPenghuni::findOrFail($id);
        $nomor = $riwayat->nomor_rumah;
        $riwayat->delete();
        
        return redirect()->route('nomor-rumah.show', $nomor)->with('success', 'Penghuni dihapus');
    }
}