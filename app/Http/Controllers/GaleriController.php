<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Yajra\DataTables\Facades\DataTables;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class GaleriController extends Controller implements HasMiddleware
{

    public static function middleware(): array
    {
        return [
            new Middleware('permission:create galeri', only: ['create']),
            new Middleware('permission:read galeri', only: ['index']),
            new Middleware('permission:update galeri', only: ['edit']),
            new Middleware('permission:delete galeri', only: ['destroy']),
        ];
    }
    /**
     * Display a listing of the resource.
     */
    public function indexFoto()
    {
        $foto = Galeri::where('status_file', 1)->get();
        return view('galeri.listFoto', compact('foto'));
    }


    public function indexVideo()
    {
        $video = Galeri::where('status_file', 2)->get();
        return view('galeri.listVideo', compact('video'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function createFoto()
    {
        return view('galeri.createFoto');
    }

    public function createVideo()
    {
        return view('galeri.createvideo');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeFoto(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'judul' => 'required|min:3',
            'deskripsi' => 'required|min:20',
            'file.*' => 'nullable|file|mimes:jpg,jpeg,png|max:2048',
            'status_foto' => 'required',
            // 'url' => 'required',
            'tags' => 'nullable|json',
            'tanggal_unggah' => 'required',
            'tanggal_publish_mulai' => 'required',
            'tanggal_publis_selesai' => 'required',
        ], [
            'judul.required' => 'Judul harus diisi.',
            'judul.min' => 'Judul minimal harus 3 karakter.',
            'deskripsi.required' => 'Deskripsi harus diisi.',
            'deskripsi.min' => 'Deskripsi minimal harus 20 karakter.',
            'status_foto.min' => 'Status Foto Harus Dipilih.',
            'file.*.mimes' => 'File harus memiliki format JPG, JPEG, atau PNG.',
            'file.*.max' => 'Ukuran file tidak boleh lebih dari 2MB.',
            'status_foto.required' => 'Pilih Status Publish Foto.',
            // 'url.required' => 'URL harus diisi.',
            'tags.json' => 'Tags harus dalam format JSON yang valid.',
            'tanggal_unggah.required' => 'Tanggal Publish harus diisi.',
            'tanggal_publish_mulai.required' => 'Tanggal Mulai Publish harus diisi.',
            'tanggal_publis_selesai.required' => 'Tanggal Selesai Publish harus diisi.',
        ]);

        if ($validator->passes()) {
            // dd($request);
            $foto = new Galeri();
            $foto->judul = $request->judul;
            $foto->slug = Str::slug($request->judul);
            $foto->deskripsi = $request->deskripsi;
            $foto->status_foto = $request->status_foto;
            // $foto->url = $request->url;
            $foto->tags = json_encode($request->tags);
            $foto->tanggal_unggah = $request->tanggal_unggah;
            $foto->tanggal_publish_mulai = $request->tanggal_publish_mulai;
            $foto->tanggal_publis_selesai = $request->tanggal_publis_selesai;
            $foto->status_file = 1;
            $foto->status_tampil = 0;
            $foto->status_foto = $request->status_foto;
            // Proses tags
            if ($request->has('tags')) {
                $tags = json_decode($request->tags, true); // Decode JSON dari Tagify
                $foto->tags = json_encode(array_column($tags, 'value')); // Encode ke JSON sebelum disimpan
            } else {
                $foto->tags = json_encode([]); // Pastikan tetap dalam format JSON
            }

            $foto->save();

            // Proses file
            if ($request->hasFile('file')) {
                foreach ($request->file('file') as $file) {
                    $foto->addMedia($file)
                        ->toMediaCollection('images', 'public');
                }
            }
            return redirect()->route('foto.list')->with('success', 'Foto berhasil disimpan.');
        } else {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    }

    public function updateStatus(Request $request)
    {
        $foto = Galeri::findOrFail($request->id);

        // Ambil nilai status_file dari foto yang sedang diupdate
        $statusFile = $foto->status_file;

        // Tentukan batas maksimum berdasarkan status_file
        $batasMaksimum = ($statusFile == 1) ? 2 : 1; // Sesuaikan batasnya

        // Hitung jumlah foto lain yang sudah ditampilkan dengan status_file yang sama
        $jumlahTampil = Galeri::where('status_tampil', 1)
            ->where('status_file', $statusFile) // Pastikan hanya menghitung yang memiliki status_file yang sama
            ->where('id', '!=', $foto->id) // Hindari menghitung dirinya sendiri
            ->count();

        // Jika status akan diaktifkan dan total menjadi lebih dari batas maksimum, tolak perubahan
        if ($request->status_tampil == 1 && $jumlahTampil >= $batasMaksimum) {
            return response()->json([
                'success' => false,
                'message' => 'Foto yang ditampilkan melebihi batas maksimum untuk kategori ini.'
            ], 400);
        }

        // Update status tampil
        $foto->status_tampil = $request->status_tampil;
        $foto->save();

        return response()->json([
            'success' => true,
            'message' => 'Status berhasil diperbarui.'
        ]);
    }

    public function storeVideo(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'judul' => 'required|min:3',
            'deskripsi' => 'required|min:20',
            'status_foto' => 'required',
            'url' => 'required',
            'tags' => 'nullable|json',
            'tanggal_unggah' => 'required',
            'tanggal_publish_mulai' => 'required',
            'tanggal_publis_selesai' => 'required',
        ], [
            'judul.required' => 'Judul harus diisi.',
            'judul.min' => 'Judul minimal harus 3 karakter.',
            'deskripsi.required' => 'Deskripsi harus diisi.',
            'deskripsi.min' => 'Deskripsi minimal harus 20 karakter.',
            'status_foto.min' => 'Status Foto Harus Dipilih.',
            'file.*.mimes' => 'File harus memiliki format JPG, JPEG, atau PNG.',
            'file.*.max' => 'Ukuran file tidak boleh lebih dari 2MB.',
            'status_foto.required' => 'Pilih Status Publish Foto.',
            'url.required' => 'URL harus diisi.',
            'tags.json' => 'Tags harus dalam format JSON yang valid.',
            'tanggal_unggah.required' => 'Tanggal Publish harus diisi.',
            'tanggal_publish_mulai.required' => 'Tanggal Mulai Publish harus diisi.',
            'tanggal_publis_selesai.required' => 'Tanggal Selesai Publish harus diisi.',
        ]);

        if ($validator->passes()) {
            // dd($request);
            $foto = new Galeri();
            $foto->judul = $request->judul;
            $foto->slug = Str::slug($request->judul);
            $foto->deskripsi = $request->deskripsi;
            $foto->status_foto = $request->status_foto;
            $foto->url = $request->url;
            $foto->tags = json_encode($request->tags);
            $foto->tanggal_unggah = $request->tanggal_unggah;
            $foto->tanggal_publish_mulai = $request->tanggal_publish_mulai;
            $foto->tanggal_publis_selesai = $request->tanggal_publis_selesai;
            $foto->status_file = 2;
            $foto->status_tampil = 0;
            $foto->status_foto = $request->status_foto;
            // Proses tags
            if ($request->has('tags')) {
                $tags = json_decode($request->tags, true); // Decode JSON dari Tagify
                $foto->tags = json_encode(array_column($tags, 'value')); // Encode ke JSON sebelum disimpan
            } else {
                $foto->tags = json_encode([]); // Pastikan tetap dalam format JSON
            }

            $foto->save();

            return redirect()->route('video.list')->with('success', 'Video berhasil disimpan.');
        } else {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    public function showVideo($slug)
    {
        $video = Galeri::where('slug', $slug)->first(); // Gunakan first(), bukan get()

        if (!$video) {
            abort(404, 'Video tidak ditemukan');
        }

        return view('galeri.showVideo', compact('video'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editFoto(string $id)
    {
        $foto = Galeri::findOrFail($id);
        $mediaItems = $foto->getMedia('images');

        // dd($mediaItems);

        return view('galeri.editFoto', [
            'foto' => $foto,
            'mediaItems' => $mediaItems,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateFoto(Request $request, $id)
    {
        $foto = Galeri::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'judul' => 'required|min:3',
            'deskripsi' => 'required|min:20',
            'file.*' => 'nullable|file|mimes:jpg,jpeg,png|max:2048',
            'status_foto' => 'required',
            // 'url' => 'required',
            'tags' => 'nullable|json',
            'tanggal_unggah' => 'required',
            'tanggal_publish_mulai' => 'required',
            'tanggal_publis_selesai' => 'required',
        ], [
            'judul.required' => 'Judul harus diisi.',
            'judul.min' => 'Judul minimal harus 3 karakter.',
            'deskripsi.required' => 'Deskripsi harus diisi.',
            'deskripsi.min' => 'Deskripsi minimal harus 20 karakter.',
            'status_foto.min' => 'Status Foto Harus Dipilih.',
            'file.*.mimes' => 'File harus memiliki format JPG, JPEG, atau PNG.',
            'file.*.max' => 'Ukuran file tidak boleh lebih dari 2MB.',
            'status_foto.required' => 'Pilih Status Publish Foto.',
            // 'url.required' => 'URL harus diisi.',
            'tags.json' => 'Tags harus dalam format JSON yang valid.',
            'tanggal_unggah.required' => 'Tanggal Publish harus diisi.',
            'tanggal_publish_mulai.required' => 'Tanggal Mulai Publish harus diisi.',
            'tanggal_publis_selesai.required' => 'Tanggal Selesai Publish harus diisi.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $foto->update([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'status_foto' => $request->status_foto,
            'tags' => $request->has('tags') ? json_encode(array_column(json_decode($request->tags, true), 'value')) : json_encode([]),
            'tanggal_unggah' => $request->tanggal_unggah,
            'tanggal_publish_mulai' => $request->tanggal_publish_mulai,
            'tanggal_publis_selesai' => $request->tanggal_publis_selesai,
        ]);

        // **Cek apakah ada file baru yang diunggah**
        if ($request->hasFile('file')) {
            $foto->clearMediaCollection('images');
            foreach ($request->file('file') as $file) {
                $foto->addMedia($file)
                    ->preservingOriginal()
                    ->toMediaCollection('images', 'public'); // Disimpan langsung ke public/images
            }
        }

        return redirect()->route('foto.list')->with('success', 'Foto berhasil diperbarui.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    private function extractYouTubeID($url)
    {
        preg_match('/(?:youtu\.be\/|youtube\.com\/(?:.*v=|.*\/)([^&?]*))/', $url, $match);
        return $match[1] ?? null;
    }

    public function editVideo(string $id)
    {
        $video = Galeri::findOrFail($id);

        // Tambahkan YouTube ID agar bisa langsung dipakai di view
        $video->youtube_id = $this->extractYouTubeID($video->url);

        return view('galeri.editVideo', compact('video'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateVideo(Request $request, $id)
    {
        $video = Galeri::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'judul' => 'required|min:3',
            'deskripsi' => 'required|min:20',
            'status_foto' => 'required',
            'url' => 'required',
            'tags' => 'nullable|json',
            'tanggal_unggah' => 'required',
            'tanggal_publish_mulai' => 'required',
            'tanggal_publis_selesai' => 'required',
        ], [
            'judul.required' => 'Judul harus diisi.',
            'judul.min' => 'Judul minimal harus 3 karakter.',
            'deskripsi.required' => 'Deskripsi harus diisi.',
            'deskripsi.min' => 'Deskripsi minimal harus 20 karakter.',
            'status_foto.min' => 'Status Foto Harus Dipilih.',
            'status_foto.required' => 'Pilih Status Publish Foto.',
            'url.required' => 'URL harus diisi.',
            'tags.json' => 'Tags harus dalam format JSON yang valid.',
            'tanggal_unggah.required' => 'Tanggal Publish harus diisi.',
            'tanggal_publish_mulai.required' => 'Tanggal Mulai Publish harus diisi.',
            'tanggal_publis_selesai.required' => 'Tanggal Selesai Publish harus diisi.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $video->update([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'status_foto' => $request->status_foto,
            'url' => $request->url,
            'tags' => $request->has('tags') ? json_encode(array_column(json_decode($request->tags, true), 'value')) : json_encode([]),
            'tanggal_unggah' => $request->tanggal_unggah,
            'tanggal_publish_mulai' => $request->tanggal_publish_mulai,
            'tanggal_publis_selesai' => $request->tanggal_publis_selesai,
        ]);

        return redirect()->route('video.list')->with('success', 'Video berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $foto = Galeri::find($id);

        if ($foto == null) {
            session()->flash('error', 'Article not found');
            return response()->json([
                'status' => false
            ]);
        }
        $foto->delete();

        session()->flash('success', 'Article berhasil dihapus');
        return response()->json([
            'status' => true
        ]);
    }
}
