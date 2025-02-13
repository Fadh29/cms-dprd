<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use App\Models\Kegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class AgendaController extends Controller implements HasMiddleware
{

    public static function middleware(): array
    {
        return [
            new Middleware('permission:create agenda', only: ['create']),
            new Middleware('permission:read agenda', only: ['list']),
            new Middleware('permission:update agenda', only: ['edit']),
            new Middleware('permission:delete agenda', only: ['destroy']),
        ];
    }

    public function create()
    {
        return view('agenda.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tanggal_kegiatan' => 'required|date',
            'kegiatan.*.waktu_kegiatan' => 'required|date_format:H:i',
            'kegiatan.*.judul_kegiatan' => 'required|string|max:255',
            'kegiatan.*.deskripsi_kegiatan' => 'required|string',
        ], [
            'tanggal_kegiatan.required' => 'Tanggal kegiatan harus diisi.',
            'kegiatan.*.waktu_kegiatan.required' => 'Waktu kegiatan harus diisi.',
            'kegiatan.*.waktu_kegiatan.date_format' => 'Format waktu kegiatan harus HH:MM.',
            'kegiatan.*.judul_kegiatan.required' => 'Judul kegiatan harus diisi.',
            'kegiatan.*.deskripsi_kegiatan.required' => 'Deskripsi kegiatan harus diisi.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // dd($request);

        $agenda = Agenda::create([
            'tanggal_kegiatan' => $request->tanggal_kegiatan,
        ]);

        if ($request->has('kegiatan')) {
            foreach ($request->kegiatan as $kegiatan) {
                Kegiatan::create([
                    'agenda_id' => $agenda->id,
                    'waktu_kegiatan' => $kegiatan['waktu_kegiatan'],
                    'judul_kegiatan' => $kegiatan['judul_kegiatan'],
                    'deskripsi_kegiatan' => $kegiatan['deskripsi_kegiatan'],
                ]);
            }
        }

        return redirect()->route('agenda.list')->with('success', 'Agenda berhasil ditambahkan.');
    }


    public function index()
    {
        $agenda = Agenda::latest()->paginate(1);
        return view('agenda.list', [
            'agenda' => $agenda,
        ]);
    }

    public function edit(Agenda $agenda)
    {
        // Load kegiatan dan urutkan berdasarkan waktu_kegiatan ASC
        $agenda->load(['kegiatan' => function ($query) {
            $query->orderBy('waktu_kegiatan', 'ASC');
        }]);

        return view('agenda.edit', compact('agenda'));
    }

    public function update(Request $request, Agenda $agenda)
    {
        // Validasi data yang dikirimkan
        $validator = Validator::make($request->all(), [
            'tanggal_kegiatan' => 'required|date',
            'kegiatan.*.waktu_kegiatan' => 'required',
            'kegiatan.*.judul_kegiatan' => 'required|string|max:255',
            'kegiatan.*.deskripsi_kegiatan' => 'required|string',
        ], [
            'tanggal_kegiatan.required' => 'Tanggal kegiatan harus diisi.',
            'kegiatan.*.waktu_kegiatan.required' => 'Waktu kegiatan harus diisi.',
            'kegiatan.*.judul_kegiatan.required' => 'Judul kegiatan harus diisi.',
            'kegiatan.*.deskripsi_kegiatan.required' => 'Deskripsi kegiatan harus diisi.',
        ]);

        // Jika validasi gagal, redirect kembali dengan pesan error
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Update tanggal kegiatan
        $agenda->update(['tanggal_kegiatan' => $request->tanggal_kegiatan]);

        if ($request->has('kegiatan')) {
            // Ambil semua kegiatan yang terkait dengan agenda ini
            $existingKegiatan = Kegiatan::where('agenda_id', $agenda->id)->get();

            // Proses setiap kegiatan yang dikirimkan
            foreach ($request->kegiatan as $index => $kegiatan) {
                // Jika kegiatan sudah ada di database, update saja
                if (isset($existingKegiatan[$index])) {
                    $existingKegiatan[$index]->update([
                        'waktu_kegiatan' => $kegiatan['waktu_kegiatan'],
                        'judul_kegiatan' => $kegiatan['judul_kegiatan'],
                        'deskripsi_kegiatan' => $kegiatan['deskripsi_kegiatan'],
                    ]);
                } else {
                    // Jika kegiatan tidak ada, buat baru
                    Kegiatan::create([
                        'agenda_id' => $agenda->id,
                        'waktu_kegiatan' => $kegiatan['waktu_kegiatan'],
                        'judul_kegiatan' => $kegiatan['judul_kegiatan'],
                        'deskripsi_kegiatan' => $kegiatan['deskripsi_kegiatan'],
                    ]);
                }
            }

            // Hapus kegiatan yang tidak ada pada data yang baru
            $existingKegiatan->skip(count($request->kegiatan))->each->delete();
        }

        return redirect()->route('agenda.list')->with('success', 'Agenda berhasil diperbarui.');
    }


    public function destroy($id)
    {
        $agenda = Agenda::find($id);

        if ($agenda == null) {
            session()->flash('error', 'agenda not found');
            return response()->json([
                'status' => false
            ]);
        }
        $agenda->delete();

        session()->flash('success', 'agenda berhasil dihapus');
        return response()->json([
            'status' => true
        ]);
    }
}
