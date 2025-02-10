<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Tags as ModelsTags;
use App\Models\Articles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

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
    public function index()
    {
        $articles = Articles::latest()->paginate(10);
        return view('articles.list', [
            'articles' => $articles,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tags = ModelsTags::orderBy('name', 'ASC')->get();
        return view('articles.create', [
            'tags' => $tags,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'title' => 'required|min:3',
            'text' => 'required',
            'author' => 'required|min:3',
            'file.*' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ], [
            'title.required' => 'Judul harus diisi.',
            'title.min' => 'Judul minimal 3 karakter.',
            'text.required' => 'Deskripsi harus diisi.',
            'author.required' => 'Nama penulis harus diisi.',
            'file.*.mimes' => 'File harus berupa gambar (jpg, jpeg, png) atau PDF.',
            'file.*.max' => 'Ukuran file maksimal 2MB.',
        ]);

        if ($validator->passes()) {
            $article = new Articles();
            $article->title = $request->title;
            $article->text = $request->text;
            $article->author = $request->author;
            $article->save();

            if ($request->has('tags_id')) {
                $article->tags()->attach($request->tags_id);
            }

            if ($request->hasFile('file')) {
                foreach ($request->file('file') as $file) {
                    $fileName = time() . '_' . $file->getClientOriginalName();
                    $file->storeAs('uploads', $fileName);
                    $article->file = isset($article->file) ? $article->file . ',' . $fileName : $fileName;
                }
                $article->save();
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

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Mengambil artikel berdasarkan ID
        $article = Articles::findOrFail($id);
        $articleTags = $article->tags->pluck('id')->toArray();
        $tags = ModelsTags::orderBy('name', 'ASC')->get();

        return view('articles.edit', [
            'article' => $article,
            'articleTags' => $articleTags,
            'tags' => $tags,
        ]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update($id, Request $request)
    {
        // Temukan artikel berdasarkan ID
        $article = Articles::findOrFail($id);

        // Validasi input
        $validator = Validator::make($request->all(), [
            'title' => 'required|min:3',
            'text' => 'required',
            'author' => 'required|min:3',
            'file.*' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048', // Validasi untuk array file
        ], [
            'title.required' => 'Judul harus diisi.',
            'title.min' => 'Judul minimal 3 karakter.',
            'text.required' => 'Deskripsi harus diisi.',
            'author.required' => 'Nama penulis harus diisi.',
            'file.*.mimes' => 'File harus berupa gambar (jpg, jpeg, png) atau PDF.',
            'file.*.max' => 'Ukuran file maksimal 2MB.',
        ]);

        if ($validator->passes()) {
            // Memperbarui data artikel
            $article->title = $request->title;
            $article->text = $request->text;
            $article->author = $request->author;

            // Menyimpan file jika ada
            if ($request->hasFile('file')) {
                $fileNames = []; // Array untuk menyimpan nama file

                foreach ($request->file('file') as $file) {
                    $fileName = time() . '_' . $file->getClientOriginalName();
                    $file->storeAs('uploads', $fileName);
                    $fileNames[] = $fileName; // Menambahkan nama file ke array
                }

                // Menggabungkan nama file menjadi string yang dipisahkan koma
                $article->file = implode(',', $fileNames);
            }

            // Simpan perubahan artikel
            $article->save();

            // Mengaitkan tag menggunakan tabel pivot
            if ($request->has('tags_id')) {
                $article->tags()->sync($request->tags_id); // Mengaitkan tag yang dipilih
            }

            return redirect()->route('articles.list')->with('success', 'Artikel berhasil diperbarui.');
        } else {
            return redirect()->back()->withErrors($validator)->withInput();
        }
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
