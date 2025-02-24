<?php

namespace App\Http\Controllers;

use App\Models\Dapil;
use App\Models\MstKecamatan;
use App\Models\MstDesa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class DapilController extends Controller implements HasMiddleware
{

    public static function middleware(): array
    {
        return [
            new Middleware('permission:create akd', only: ['create']),
            new Middleware('permission:read akd', only: ['list']),
            new Middleware('permission:update akd', only: ['edit']),
            new Middleware('permission:delete akd', only: ['destroy']),
        ];
    }

    public function index()
    {
        $dapil = Dapil::with(['kecamatan', 'desa'])->get();
        return view('dapil.list', compact('dapil'));
    }

    public function create()
    {
        $kecamatan = MstKecamatan::with('desa')->get();
        return view('dapil.create', compact('kecamatan'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255|unique:dapil,nama',
            'kecamatan_id' => 'required|array',
            'kecamatan_id.*' => 'exists:mst_kecamatan,id',
            'desa_id' => 'required|array',
            'desa_id.*' => 'exists:mst_desa,id',
        ], [
            'nama.required' => 'Nama Daerah Pilih harus diisi.',
            'nama.unique' => 'Nama Daerah Pilih sudah ada.',
            'kecamatan_id.required' => 'Minimal pilih satu kecamatan.',
            'kecamatan_id.*.exists' => 'Kecamatan yang dipilih tidak valid.',
            'desa_id.required' => 'Minimal pilih satu desa.',
            'desa_id.*.exists' => 'Desa yang dipilih tidak valid.',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $dapil = Dapil::create(['nama' => $request->nama]);

        // Gunakan attach() agar kecamatan yang sama bisa tersimpan lebih dari sekali
        foreach ($request->kecamatan_id as $kecamatan) {
            $dapil->kecamatan()->attach($kecamatan);
        }

        foreach ($request->desa_id as $desa) {
            $dapil->desa()->attach($desa);
        }

        return redirect()->route('dapil.list')->with('success', 'Dapil berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $dapil = Dapil::with(['kecamatan.desa'])->find($id);

        // Ambil ID kecamatan dan desa yang telah dipilih
        $selectedKecamatan = $dapil->kecamatan->pluck('id')->toArray();
        $selectedDesa = $dapil->desa->pluck('id')->toArray();
        // dd($selectedDesa);

        // Ambil semua kecamatan dan desanya
        $kecamatan = MstKecamatan::with('desa')->get();

        return view('dapil.edit', compact('dapil', 'kecamatan', 'selectedKecamatan', 'selectedDesa'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'kecamatan_id' => 'required|array',
            'kecamatan_id.*' => 'exists:mst_kecamatan,id',
            'desa_id' => 'required|array',
            'desa_id.*' => 'exists:mst_desa,id'
        ], [
            'nama.required' => 'Nama daerah wajib diisi.',
            'kecamatan_id.required' => 'Minimal pilih satu kecamatan.',
            'kecamatan_id.*.exists' => 'Kecamatan tidak valid.',
            'desa_id.required' => 'Minimal pilih satu desa.',
            'desa_id.*.exists' => 'Desa tidak valid.'
        ]);

        // Cari data dapil berdasarkan ID
        $dapil = Dapil::findOrFail($id);

        // Update nama dapil
        $dapil->nama = $request->nama;
        $dapil->save();

        // Hapus semua hubungan many-to-many sebelumnya untuk menghindari duplikasi
        $dapil->kecamatan()->detach();
        $dapil->desa()->detach();

        // Simpan hubungan many-to-many baru dengan attach()
        foreach ($request->kecamatan_id as $kecamatan) {
            $dapil->kecamatan()->attach($kecamatan);
        }

        foreach ($request->desa_id as $desa) {
            $dapil->desa()->attach($desa);
        }

        return redirect()->route('dapil.list')->with('success', 'Data berhasil diperbarui.');
    }



    public function destroy(Dapil $dapil)
    {
        $dapil->kecamatan()->detach();
        $dapil->desa()->detach();
        $dapil->delete();

        return redirect()->route('dapil.index')->with('success', 'Dapil berhasil dihapus.');
    }
}
