<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Validator;
use App\Models\ApaSiapa;
use App\Models\ApaSiapaTamu;

class ApaSiapaController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('permission:create apa siapa', only: ['create']),
            new Middleware('permission:read apa siapa', only: ['list']),
            new Middleware('permission:update apa siapa', only: ['edit']),
            new Middleware('permission:delete apa siapa', only: ['destroy']),
        ];
    }

    public function index()
    {
        $apaSiapa = ApaSiapa::latest()->paginate(10);
        return view('apa_siapa.list', [
            'apaSiapa' => $apaSiapa,
        ]);
    }

    public function create()
    {
        return view('apa_siapa.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tanggal_kegiatan_mulai' => 'required|date',
            'tamu.*.badan' => 'required|string|max:255',
            'tamu.*.agenda' => 'required|string',
            'tamu.*.akd_terkait' => 'string',
            'tamu.*.bagian_terkait' => 'string',
            'tamu.*.jam_mulai' => 'date_format:H:i:s',
            'tamu.*.jam_selesai' => 'date_format:H:i:s',
            'tanggal_tamu_mulai' => 'date',
            'tanggal_tamu_selesai' => 'date',
        ], [
            'tanggal_kegiatan_mulai.required' => 'Tanggal kegiatan harus diisi.',
            'tanggal_kegiatan_mulai.date' => 'Tanggal kegiatan harus berupa tanggal yang valid.',

            'tamu.*.badan.required' => 'Badan harus diisi.',
            'tamu.*.badan.string' => 'Badan harus berupa teks.',
            'tamu.*.badan.max' => 'Badan tidak boleh lebih dari 255 karakter.',

            'tamu.*.agenda.required' => 'Agenda harus diisi.',
            'tamu.*.agenda.string' => 'Agenda harus berupa teks.',

            'tamu.*.akd_terkait.required' => 'AKD terkait harus diisi.',
            'tamu.*.akd_terkait.string' => 'AKD terkait harus berupa teks.',

            'tamu.*.bagian_terkait.required' => 'Bagian terkait harus diisi.',
            'tamu.*.bagian_terkait.string' => 'Bagian terkait harus berupa teks.',

            'tamu.*.jam_mulai.date_format' => 'Jam mulai harus dalam format HH:MM.',
            'tamu.*.jam_selesai.date_format' => 'Jam selesai harus dalam format HH:MM.',

            'tamu.*.tanggal_tamu_mulai.date_format' => 'Tanggal mulai harus dalam format',
            'tamu.*.tanggal_tamu_selesai.date_format' => 'Tanggal selesai harus dalam format',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // dd($request);

        $apaSiapa = ApaSiapa::create([
            'tanggal_kegiatan_mulai' => $request->tanggal_kegiatan_mulai,
        ]);

        if ($request->has('tamu')) {
            foreach ($request->tamu as $tamu) {
                ApaSiapaTamu::create([
                    'apa_siapa_id' => $apaSiapa->id,
                    'badan' => $tamu['badan'],
                    'agenda' => $tamu['agenda'],
                    'akd_terkait' => $tamu['akd_terkait'],
                    'bagian_terkait' => $tamu['bagian_terkait'],
                    'jam_mulai' => $tamu['jam_mulai'],
                    'jam_selesai' => $tamu['jam_selesai'],
                    'tanggal_tamu_mulai' => $tamu['tanggal_tamu_mulai'],
                    'tanggal_tamu_selesai' => $tamu['tanggal_tamu_selesai'],
                ]);
            }
        }

        return redirect()->route('apa_siapa.list')->with('success', 'Apa & Siapa berhasil ditambahkan.');
    }

    public function edit(ApaSiapa $apaSiapa)
    {
        // dd($apaSiapa);
        // Load kegiatan dan urutkan berdasarkan waktu_kegiatan ASC
        $apaSiapa->load(['tamu' => function ($query) {
            $query->orderBy('tanggal_tamu_mulai', 'ASC');
        }]);


        return view('apa_siapa.edit', compact('apaSiapa'));
    }


    public function show($id)
    {
        $apaSiapa = ApaSiapa::with('tamu')->findOrFail($id);
        return response()->json($apaSiapa);
    }

    public function update(Request $request, ApaSiapa $apaSiapa)
    {
        // Validasi data yang dikirimkan
        $validator = Validator::make($request->all(), [
            'tanggal_kegiatan_mulai' => 'required|date',
            'tamu.*.badan' => 'required|string|max:255',
            'tamu.*.agenda' => 'required|string',
            'tamu.*.akd_terkait' => 'string',
            'tamu.*.bagian_terkait' => 'string',
            'tamu.*.tanggal_tamu_mulai' => 'date',
            'tamu.*.tanggal_tamu_selesai' => 'date',
        ], [
            'tanggal_kegiatan_mulai.required' => 'Tanggal kegiatan harus diisi.',
            'tanggal_kegiatan_mulai.date' => 'Tanggal kegiatan harus berupa tanggal yang valid.',

            'tamu.*.badan.required' => 'Badan harus diisi.',
            'tamu.*.badan.string' => 'Badan harus berupa teks.',
            'tamu.*.badan.max' => 'Badan tidak boleh lebih dari 255 karakter.',

            'tamu.*.agenda.required' => 'Agenda harus diisi.',
            'tamu.*.agenda.string' => 'Agenda harus berupa teks.',

            'tamu.*.akd_terkait.string' => 'AKD terkait harus berupa teks.',
            'tamu.*.bagian_terkait.string' => 'Bagian terkait harus berupa teks.',
            'tamu.*.tanggal_tamu_mulai.date' => 'Tanggal mulai harus dalam format tanggal yang valid.',
            'tamu.*.tanggal_tamu_selesai.date' => 'Tanggal selesai harus dalam format tanggal yang valid.',
        ]);

        // Jika validasi gagal, redirect kembali dengan pesan error
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Update tanggal kegiatan_mulai
        $apaSiapa->update(['tanggal_kegiatan_mulai' => $request->tanggal_kegiatan_mulai]);

        if ($request->has('tamu')) {
            // Ambil semua tamu yang terkait dengan apaSiapa ini
            $existingTamu = ApaSiapaTamu::where('apa_siapa_id', $apaSiapa->id)->get();

            // Proses setiap tamu yang dikirimkan
            foreach ($request->tamu as $index => $tamu) {
                // Jika tamu sudah ada di database, update saja
                if (isset($existingTamu[$index])) {
                    $existingTamu[$index]->update([
                        'badan' => $tamu['badan'],
                        'agenda' => $tamu['agenda'],
                        'akd_terkait' => $tamu['akd_terkait'],
                        'bagian_terkait' => $tamu['bagian_terkait'],
                        'jam_mulai' => $tamu['jam_mulai'],
                        'jam_selesai' => $tamu['jam_selesai'],
                        'tanggal_tamu_mulai' => $tamu['tanggal_tamu_mulai'],
                        'tanggal_tamu_selesai' => $tamu['tanggal_tamu_selesai'],
                    ]);
                } else {
                    // Jika tamu tidak ada, buat baru
                    ApaSiapaTamu::create([
                        'apa_siapa_id' => $apaSiapa->id,
                        'badan' => $tamu['badan'],
                        'agenda' => $tamu['agenda'],
                        'akd_terkait' => $tamu['akd_terkait'],
                        'bagian_terkait' => $tamu['bagian_terkait'],
                        'jam_mulai' => $tamu['jam_mulai'],
                        'jam_selesai' => $tamu['jam_selesai'],
                        'tanggal_tamu_mulai' => $tamu['tanggal_tamu_mulai'],
                        'tanggal_tamu_selesai' => $tamu['tanggal_tamu_selesai'],
                    ]);
                }
            }

            // Hapus tamu yang tidak ada pada data yang baru
            $existingTamu->skip(count($request->tamu))->each->delete();
        }

        return redirect()->route('apa_siapa.list')->with('success', 'Apa & Siapa berhasil diperbarui.');
    }


    public function destroy($id)
    {
        $apaSiapa = ApaSiapa::find($id);

        if ($apaSiapa == null) {
            session()->flash('error', 'Apa Siapa not found');
            return response()->json([
                'status' => false
            ]);
        }
        $apaSiapa->delete();

        session()->flash('success', 'Apa Siapa berhasil dihapus');
        return response()->json([
            'status' => true
        ]);
    }
}
