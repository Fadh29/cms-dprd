<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Tags as ModelsTags;
use App\Models\Articles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

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
            'text' => 'required|min:20',
            'author' => 'required|min:3',
            'file.*' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'summary' => 'required',
            'caption' => 'required',
            'fotografer' => 'required',
            'status_articles' => 'required',
        ], [
            'title.required' => 'Judul harus diisi.',
            'title.min' => 'Judul minimal 3 karakter.',
            'text.required' => 'Deskripsi harus diisi.',
            'text.min' => 'Deskripsi minimal 20 karakter.',
            'author.required' => 'Nama penulis harus diisi.',
            'file.*.mimes' => 'File harus berupa gambar (jpg, jpeg, png) atau PDF.',
            'file.*.max' => 'Ukuran file maksimal 2MB.',
            'summary.required' => 'Summary harus diisi.',
            'caption.required' => 'Caption harus diisi.',
            'fotografer.required' => 'Fotografer harus diisi.',
            'status_articles.required' => 'Pilih Status Artikel.',
        ]);

        if ($validator->passes()) {
            $article = new Articles();
            $article->title = $request->title;
            $article->text = $request->text;
            $article->author = $request->author;
            $article->summary = $request->summary;
            $article->caption = $request->caption;
            $article->fotografer = $request->fotografer;
            $article->status_articles = $request->status_articles;
            $article->save();

            if ($request->has('tags_id')) {
                $article->tags()->attach($request->tags_id);
            }

            if ($request->hasFile('file')) {
                foreach ($request->file('file') as $file) {
                    $article->addMedia($file)->toMediaCollection('images');
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

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Mengambil artikel berdasarkan ID
        $article = Articles::findOrFail($id);
        $articleTags = $article->tags->pluck('id')->toArray();
        $tags = ModelsTags::orderBy('name', 'ASC')->get();
        $mediaItems = $article->getMedia('images');

        // dd($mediaItems);

        return view('articles.edit', [
            'article' => $article,
            'articleTags' => $articleTags,
            'tags' => $tags,
            'mediaItems' => $mediaItems,
        ]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'title' => 'required|min:3',
            'text' => 'required|min:20',
            'author' => 'required|min:3',
            'file.*' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'summary' => 'required',
            'caption' => 'required',
            'fotografer' => 'required',
            'status_articles' => 'required',
        ], [
            'title.required' => 'Judul harus diisi.',
            'title.min' => 'Judul minimal 3 karakter.',
            'text.required' => 'Deskripsi harus diisi.',
            'text.min' => 'Deskripsi minimal 20 karakter.',
            'author.required' => 'Nama penulis harus diisi.',
            'file.*.mimes' => 'File harus berupa gambar (jpg, jpeg, png) atau PDF.',
            'file.*.max' => 'Ukuran file maksimal 2MB.',
            'summary.required' => 'Summary harus diisi.',
            'caption.required' => 'Caption harus diisi.',
            'fotografer.required' => 'Fotografer harus diisi.',
            'status_articles.required' => 'Pilih Status Artikel.',
        ]);

        if ($validator->passes()) {
            $article = Articles::findOrFail($id);
            $article->title = $request->title;
            $article->text = $request->text;
            $article->author = $request->author;
            $article->summary = $request->summary;
            $article->caption = $request->caption;
            $article->fotografer = $request->fotografer;
            $article->status_articles = $request->status_articles;
            $article->save();

            if ($request->has('tags_id')) {
                $article->tags()->sync($request->tags_id);
            }

            if ($request->hasFile('file')) {
                foreach ($request->file('file') as $file) {
                    $article->addMedia($file)->toMediaCollection('images');
                }
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
