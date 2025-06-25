<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreWargaRequest;
use App\Models\RefAgama;
use App\Models\RefMarital;
use App\Models\RefPekerjaan;
use App\Models\RefPendidikan;
use App\Models\RefShdk;
use App\Models\RefWarga;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Yajra\DataTables\Facades\DataTables;

class DaftarWargaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()){
            return DataTables::of(RefWarga::query())->make(true);
        }
        
        return view('daftar-warga.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $shdkList = RefShdk::where('is_aktif', 1)
                        ->orderBy('urutan')
                        ->pluck('nama', 'id');
                        
        $agamaList = RefAgama::where('is_aktif', 1)
                        ->pluck('nama', 'id');
                        
        $maritalList = RefMarital::where('is_aktif', 1)
                        ->pluck('nama', 'id');
        
        $pekerjaanList = RefPekerjaan::where('is_aktif', 1)
                            ->pluck('nama', 'id');
                            
        $pendidikanList = RefPendidikan::where('is_aktif', 1)
                            ->pluck('nama', 'id');
                        
        return view('daftar-warga.create', compact(
            'shdkList', 
            'agamaList', 
            'maritalList', 
            'pekerjaanList',
            'pendidikanList'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreWargaRequest $request)
    {
        $data = $request->validated();
        $data['status_hubungan_keluarga'] = $request->shdk;
        $data += $request->except('foto_ktp_path');
        
        if($request->hasFile('foto_ktp_path')){
            $file = $request->file('foto_ktp_path');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/foto_warga', $filename);
            $data['foto_ktp_path'] = $filename;
        }
        
        $warga = RefWarga::create($data);
        
        return redirect()->route('daftar-warga.show', $warga)
                        ->with('success', 'Data warga berhasil simpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RefWarga  $refWarga
     * @return \Illuminate\Http\Response
     */
    public function show(RefWarga $refWarga)
    {
        $warga = RefWarga::where('id', $refWarga->id);
        
        return view('daftar-warga.view', compact('warga'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RefWarga  $refWarga
     * @return \Illuminate\Http\Response
     */
    public function edit(RefWarga $refWarga)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RefWarga  $refWarga
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RefWarga $refWarga)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RefWarga  $refWarga
     * @return \Illuminate\Http\Response
     */
    public function destroy(RefWarga $refWarga)
    {
        //
    }
}
