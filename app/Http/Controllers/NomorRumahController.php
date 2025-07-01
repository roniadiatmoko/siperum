<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNomorRumahRequest;
use App\Models\RefNomorRumah;
use Illuminate\Http\Request;

class NomorRumahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rumah = RefNomorRumah::all();
        return view('nomor-rumah.index', compact('rumah'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('nomor-rumah.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNomorRumahRequest $request)
    {
        RefNomorRumah::create($request->only(['nomor_rumah', 'is_aktif']));
        return redirect()->route('nomor-rumah.index')->with('success', 'Post created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rumah = RefNomorRumah::where('nomor_rumah', $id)->firstOrFail();
        $riwayat = $rumah->riwayatPenghuni()
                    ->with('warga')
                    ->orderByDesc('is_aktif')
                    ->get();
        
        return view('nomor-rumah.show', compact('rumah', 'riwayat'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rumah = RefNomorRumah::findOrFail($id);
        
        return view('nomor-rumah.edit', compact('rumah'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreNomorRumahRequest $request, $id)
    {
        RefNomorRumah::where('nomor_rumah', $id)->update($request->except(['_token', '_method']));
        
        return redirect()->route('nomor-rumah.index')->with('success', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        RefNomorRumah::where('nomor_rumah', $id)->delete();
        
        return redirect()->route('nomor-rumah.index')->with('success', 'Data berhasil dihapus');
    }
}
