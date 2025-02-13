<?php

namespace App\Http\Controllers;

use App\Models\Tupoksi;
use Illuminate\Http\Request;

class TupoksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tupoksi = Tupoksi::first(); // Ambil data pertama jika ada
        return view('tupoksi.index', compact('tupoksi'));
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

        $tupoksi = Tupoksi::first(); // Cek apakah sudah ada data

        // dd($tupoksi);

        if ($tupoksi) {
            $tupoksi->update(['deskripsi' => $request->deskripsi]);
        } else {
            Tupoksi::create(['deskripsi' => $request->deskripsi]);
        }

        return redirect()->back()->with('success', 'Tupoksi berhasil disimpan.');
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
