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
            $query = RefWarga::select([
                            'id','nama','jenis_kelamin','no_hp','is_aktif'
                        ])
                        ->orderByDesc('is_aktif')
                        ->orderBy('nama', 'asc');
                        
            return DataTables::eloquent($query)
                        ->addIndexColumn()
                        ->editColumn('jenis_kelamin', function ($row){
                            return $row->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan';
                        })
                        ->addColumn('action', function ($row){
                            $urlDetail = route('daftar-warga.show', ['daftar_warga' => $row->id]);
                            $urlUpdate = route('daftar-warga.edit', ['daftar_warga' => $row->id]);
                            $urlDelete = route('daftar-warga.destroy', ['daftar_warga' => $row->id]);
                            
                            return '
                                <div class="flex flex-row justify-center">
                                    <a href="' . $urlDetail . '" class="text-white bg-blue-600 py-2 px-2 rounded mx-2 hover:bg-blue-800"><i class="fas fa-eye"></i> Detail</a>
                                    <a href="' . $urlUpdate . '" class="text-white bg-orange-600 py-2 px-2 rounded mx-2 hover:bg-orange-800"><i class="fas fa-pencil"></i> Perbarui</a>
                                    <a href="' . $urlDelete . '" class="text-white bg-red-600 py-2 px-2 rounded mx-2 hover:bg-red-800"><i class="fas fa-trash"></i> Hapus</a>
                                </div>
                            ';
                        })
                        ->rawColumns(['action'])
                        ->make(true);
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
        $data += $request->except('foto_ktp_path');
        
        if($request->hasFile('foto_ktp_path')){
            $file = $request->file('foto_ktp_path');
            $filename = $request->nik . '_' . $file->getClientOriginalExtension();
            $file->storeAs('public/foto_warga', $filename);
            $data['foto_ktp_path'] = $filename;
        }
        
        $warga = RefWarga::create($data);
        
        return redirect()->route('daftar-warga.show', $warga->id)
                        ->with('success', 'Data warga berhasil simpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RefWarga  $refWarga
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $warga = RefWarga::where('id', $id)->firstOrFail();
        
        return view('daftar-warga.view', compact('warga'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RefWarga  $refWarga
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $warga = RefWarga::where('id', $id)->firstOrFail();
        
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
                        
        return view('daftar-warga.edit', compact(
            'warga',
            'shdkList', 
            'agamaList', 
            'maritalList', 
            'pekerjaanList',
            'pendidikanList'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RefWarga  $refWarga
     * @return \Illuminate\Http\Response
     */
    public function update(StoreWargaRequest $request, $id)
    {
        $data = $request->validated();
        $data += $request->except('foto_ktp_path', '_token', '_method');
        
        if($request->hasFile('foto_ktp_path')){
            $file = $request->file('foto_ktp_path');
            $filename = $request->nik . '_' . $file->getClientOriginalExtension();
            $file->storeAs('public/foto_warga', $filename);
            $data['foto_ktp_path'] = $filename;
        }
        
        RefWarga::where('id', $id)->update($data);
        
        return redirect()->route('daftar-warga.show', $id)->with('success', 'Berhasil diperbarui');
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
