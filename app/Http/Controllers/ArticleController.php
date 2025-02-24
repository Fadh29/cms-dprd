<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Tags as ModelsTags;
use App\Models\Articles;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Yajra\DataTables\Facades\DataTables;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

use function Pest\Laravel\json;

class ArticleController extends Controller implements HasMiddleware
{

    public static function middleware(): array
    {
        return [
            new Middleware('permission:create articles', only: ['create']),
            new Middleware('permission:read articles', only: ['index']),
            new Middleware('permission:update articles', only: ['edit']),
            new Middleware('permission:delete articles', only: ['destroy']),
        ];
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $articles = Articles::latest()->select('id', 'title', 'text', 'status_articles', 'author', 'created_at');

            return DataTables::of($articles)
                ->addIndexColumn()
                ->editColumn('title', function ($article) {
                    return \Str::words($article->title, 10, '...');
                })
                ->editColumn('text', function ($article) {
                    return \Str::limit(strip_tags(html_entity_decode($article->text)), 150, '...');
                })
                ->editColumn('status_articles', function ($article) {
                    $status = [
                        'publish' => ['bg' => '#ecfdf5', 'text' => '#16a34a'],
                        'draft' => ['bg' => '#fefcbf', 'text' => '#d97706'],
                        'validasi' => ['bg' => '#fef2f2', 'text' => '#dc2626'],
                        'spesial' => ['bg' => '#fef9c3', 'text' => '#b7791f'],
                    ];
                    return '<span class="px-3 py-1 rounded-full text-sm font-medium" style="background-color: ' . $status[$article->status_articles]['bg'] . '; color: ' . $status[$article->status_articles]['text'] . ';">' . $article->status_articles . '</span>';
                })
                ->editColumn('created_at', function ($article) {
                    return \Carbon\Carbon::parse($article->created_at)->format('d M, Y');
                })
                ->addColumn('action', function ($article) {
                    return view('articles.partials.actions', compact('article'))->render();
                })
                ->rawColumns(['status_articles', 'action'])
                ->make(true);
        }

        return view('articles.list');
    }

    public function indexKhusus()
    {
        $articles = Articles::where('kategori', 'khusus')->select('title', 'super_article')->get();
        return view('articles.indexKhusus', compact('articles'));
    }


    // public function index(Request $request)
    // {
    //     $articles = Articles::latest()->select('id', 'title', 'text', 'status_articles', 'author', 'created_at')->get();

    //     return view('articles.list', compact('articles'));
    // }


    /**
     * Show the form for creating a new resource.
     */
    // public function create()
    // {
    //     $tags = ModelsTags::orderBy('name', 'ASC')->get();
    //     return view('articles.create', [
    //         'tags' => $tags,
    //     ]);
    // } INI YANG BISA

    public function create()
    {
        $tags = ModelsTags::orderBy('name', 'ASC')->get();
        return view('articles.create', [
            'tags' => $tags,
            'article' => null, // Untuk create, tidak ada artikel
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request)
    // {
    //     // Validasi input
    //     $validator = Validator::make($request->all(), [
    //         'title' => 'required|min:3',
    //         'text' => 'required|min:20',
    //         'author' => 'required|min:3',
    //         'file.*' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
    //         'summary' => 'required',
    //         'caption' => 'required',
    //         'fotografer' => 'required',
    //         'status_articles' => 'required',
    //     ], [
    //         'title.required' => 'Judul harus diisi.',
    //         'title.min' => 'Judul minimal 3 karakter.',
    //         'text.required' => 'Deskripsi harus diisi.',
    //         'text.min' => 'Deskripsi minimal 20 karakter.',
    //         'author.required' => 'Nama penulis harus diisi.',
    //         'file.*.mimes' => 'File harus berupa gambar (jpg, jpeg, png) atau PDF.',
    //         'file.*.max' => 'Ukuran file maksimal 2MB.',
    //         'summary.required' => 'Summary harus diisi.',
    //         'caption.required' => 'Caption harus diisi.',
    //         'fotografer.required' => 'Fotografer harus diisi.',
    //         'status_articles.required' => 'Pilih Status Artikel.',
    //     ]);

    //     if ($validator->passes()) {
    //         $article = new Articles();
    //         $article->title = $request->title;
    //         $article->text = $request->text;
    //         $article->author = $request->author;
    //         $article->summary = $request->summary;
    //         $article->caption = $request->caption;
    //         $article->fotografer = $request->fotografer;
    //         $article->status_articles = $request->status_articles;
    //         $article->save();

    //         if ($request->has('tags_id')) {
    //             $article->tags()->attach($request->tags_id);
    //         }

    //         if ($request->hasFile('file')) {
    //             foreach ($request->file('file') as $file) {
    //                 $article->addMedia($file)->toMediaCollection('images');
    //             }
    //         }

    //         return redirect()->route('articles.list')->with('success', 'Artikel berhasil disimpan.');
    //     } else {
    //         return redirect()->back()->withErrors($validator)->withInput();
    //     }
    // } INI YANG SUDAH BISA

    public function store(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'title' => 'required|min:3',
            'text' => 'required|min:20',
            'author' => 'required|min:3',
            'file.*' => 'nullable|file|mimes:jpg,jpeg,png|max:2048',
            'caption' => 'required',
            'fotografer' => 'required',
            'status_articles' => 'required',
            'tags' => 'nullable|json',
            'tgl_publish' => 'required',
            'kategori' => 'required',
            'super_article' => 'nullable',
            'spesial_kategori' => 'required',
        ], [
            'title.required' => 'Judul Konten harus diisi.',
            'title.min' => 'Judul minimal 3 karakter.',
            'author.required' => 'Penulis Konten  harus diisi.',
            'author.min' => 'Penulis Konten minimal 3 karakter.',
            'fotografer.required' => 'Caption Gambar/Fotografer Konten harus diisi.',
            'tgl_publish.required' => 'Tanggal Publish Harus Diisi.',
            'kategori.required' => 'Pilih Kategori Konten.',
            'spesial_kategori.required' => 'Pilih Status Konten.',
            'status_articles.required' => 'Pilih Status Publish Konten.',
            'text.required' => 'Isi Konten harus diisi.',
            'text.min' => 'Isi Konten minimal 20 karakter.',
            'caption.required' => 'Caption Konten harus diisi.',
            'file.*.mimes' => 'File harus berupa gambar (jpg, jpeg, png).',
            'file.*.max' => 'Ukuran file maksimal 2MB.',
        ]);

        if ($validator->passes()) {
            // dd($request);
            $article = new Articles();
            $article->title = $request->title;
            $article->slug = Str::slug($request->title);
            $article->text = $request->text;
            $article->author = $request->author;
            $article->caption = $request->caption;
            $article->fotografer = $request->fotografer;
            $article->status_articles = $request->status_articles;
            $article->tags = json_encode($request->tags);
            $article->tgl_publish = $request->tgl_publish;
            $article->kategori = $request->kategori;
            $article->spesial_kategori = $request->spesial_kategori;

            $article->super_article = $request->kategori === "khusus" ? $request->text : null;

            // Proses tags
            if ($request->has('tags')) {
                $tags = json_decode($request->tags, true); // Decode JSON dari Tagify
                $article->tags = json_encode(array_column($tags, 'value')); // Encode ke JSON sebelum disimpan
            } else {
                $article->tags = json_encode([]); // Pastikan tetap dalam format JSON
            }

            $article->save();

            // Proses file
            if ($request->hasFile('file')) {
                foreach ($request->file('file') as $file) {
                    $article->addMedia($file)
                        ->toMediaCollection('images', 'public'); // Simpan langsung ke 'public' disk
                }
            }
            return redirect()->route('articles.list')->with('success', 'Artikel berhasil disimpan.');
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

    public function showKhusus($slug)
    {
        $article = Articles::where('slug', $slug)->firstOrFail();
        return view('articles.showKhusus', compact('article'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Mengambil artikel berdasarkan ID
        $article = Articles::findOrFail($id);
        // $articleTags = $article->tags->pluck('id')->toArray();
        $tags = ModelsTags::orderBy('name', 'ASC')->get();
        $mediaItems = $article->getMedia('images');

        // dd($mediaItems);

        return view('articles.edit', [
            'article' => $article,
            'tags' => $tags,
            'mediaItems' => $mediaItems,
        ]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $article = Articles::findOrFail($id);

        // Validasi input
        $validator = Validator::make($request->all(), [
            'title' => 'required|min:3',
            'text' => 'required|min:20',
            'author' => 'required|min:3',
            'file' => 'nullable|array', // Pastikan `file` berupa array jika lebih dari satu
            'file.*' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'caption' => 'required',
            'fotografer' => 'required',
            'status_articles' => 'required',
            'tags' => 'nullable|json',
            'tgl_publish' => 'required',
            'kategori' => 'required',
            'super_article' => 'nullable',
            'spesial_kategori' => 'required',
        ], [
            'title.required' => 'Judul Konten harus diisi.',
            'title.min' => 'Judul minimal 3 karakter.',
            'author.required' => 'Penulis Konten  harus diisi.',
            'author.min' => 'Penulis Konten minimal 3 karakter.',
            'fotografer.required' => 'Caption Gambar/Fotografer Konten harus diisi.',
            'tgl_publish.required' => 'Tanggal Publish Harus Diisi.',
            'kategori.required' => 'Pilih Kategori Konten.',
            'spesial_kategori.required' => 'Pilih Status Konten.',
            'status_articles.required' => 'Pilih Status Publish Konten.',
            'text.required' => 'Isi Konten harus diisi.',
            'text.min' => 'Isi Konten minimal 20 karakter.',
            'caption.required' => 'Caption Konten harus diisi.',
            'file.*.mimes' => 'File harus berupa gambar (jpg, jpeg, png).',
            'file.*.max' => 'Ukuran file maksimal 2MB.',
        ]);
        // dd($article->getMedia('images')->first()->getPath());
        // dd($request->text, $article->text);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Update data artikel
        $article->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'text' => $request->text,
            'author' => $request->author,
            'caption' => $request->caption,
            'fotografer' => $request->fotografer,
            'status_articles' => $request->status_articles,
            'tgl_publish' => $request->tgl_publish,
            'kategori' => $request->kategori,
            'spesial_kategori' => $request->spesial_kategori,
            'tags' => $request->has('tags') ? json_encode(array_column(json_decode($request->tags, true), 'value')) : json_encode([]),
            'super_article' => $request->kategori === "khusus" ? $request->text : null,
        ]);

        // **Cek apakah ada file baru yang diunggah**
        if ($request->hasFile('file')) {
            $article->clearMediaCollection('images');
            foreach ($request->file('file') as $file) {
                $article->addMedia($file)
                    ->preservingOriginal()
                    ->toMediaCollection('images', 'public'); // Disimpan langsung ke public/images
            }
        }

        // if ($request->hasFile('file')) {
        //     // Hapus file lama hanya jika ada file baru
        //     $article->clearMediaCollection('images');

        //     // **Upload file baru**
        //     foreach ((array) $request->file('file') as $file) {
        //         $article->addMedia($file)->toMediaCollection('images');
        //     }
        // }


        return redirect()->route('articles.list')->with('success', 'Artikel berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $article = Articles::find($id);

        if ($article == null) {
            session()->flash('error', 'Article not found');
            return response()->json([
                'status' => false
            ]);
        }
        $article->delete();

        session()->flash('success', 'Article berhasil dihapus');
        return response()->json([
            'status' => true
        ]);
    }
}
