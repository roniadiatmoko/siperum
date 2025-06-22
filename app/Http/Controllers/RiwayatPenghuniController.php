<?php

namespace App\Http\Controllers;

use App\Models\RiwayatPenghuni;
use Illuminate\Http\Request;

class RiwayatPenghuniController extends Controller
{
    public function create(Request $request){
        return view('riwayat-penghuni.create');
    }
    
    
    public function store(Request $request){
        $request->validate([
            'nomor_rumah' => 'required',
            'nama' => 'required|string|max:255',
            'shdk' => 'required',
            'tanggal_masuk' => 'nullable|date',
        ]);
        
        RiwayatPenghuni::create([
            'nomor_rumah' => $request->nomor_rumah,
            'nama' => $request->nama,
            'tanggal_masuk' => $request->tanggal_masuk,
            'shdk' => $request->shdk
        ]);
        
        return redirect()->route('nomor-rumah.show', $request->nomor_rumah)->with('success', 'Penghuni Ditambahkan');
    }
    
    public function update(Request $request, $id){
        $riwayat = RiwayatPenghuni::findOrFail($id);
        
        $request->validate([
            'nama' => 'required|string|max:255',
            'tanggal_masuk' => 'nullable|date',
            'shdk' => 'required'
        ]);
        
        $riwayat->update([
            'nama' => $request->nama,
            'tanggal_masuk' => $request->tanggal_masuk,
            'shdk' => $request->shdk
        ]);
        
        return redirect()->route('nomor-rumah.show', $riwayat->nomor_rumah)->with('success', 'Berhasil diperbarui');
    }
    
    public function destroy($id){
        $riwayat = RiwayatPenghuni::findOrFail($id);
        $nomor = $riwayat->nomor_rumah;
        $riwayat->delete();
        
        return redirect()->route('nomor-rumah.show', $nomor)->with('success', 'Penghuni dihapus');
    }
}