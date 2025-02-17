<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TataTertibModel;

class TataTertibController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function create()
    {
        $tataTertib = TataTertibModel::first(); // Ambil data pertama jika ada
        return view('tata_tertib.index', compact('tataTertib'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input tidak boleh kosong
        $request->validate([
            'deskripsi' => 'required|string'
        ]);

        $tataTertib = TataTertibModel::first(); // Cek apakah sudah ada data

        // dd($tupoksi);

        if ($tataTertib) {
            $tataTertib->update(['deskripsi' => $request->deskripsi]);
        } else {
            TataTertibModel::create(['deskripsi' => $request->deskripsi]);
        }

        return redirect()->back()->with('success', 'Tata Tertib berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
