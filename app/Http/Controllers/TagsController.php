<?php

namespace App\Http\Controllers;

use App\Models\Tags as ModelsTags;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Spatie\Permission\Models\Tags;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

// class RoleController extends Controller
class TagsController extends Controller implements HasMiddleware
{

    public static function middleware(): array
    {
        return [
            new Middleware('permission:create tags', only: ['create']),
            new Middleware('permission:read tags', only: ['index']),
            new Middleware('permission:update tags', only: ['edit']),
            new Middleware('permission:delete tags', only: ['destroy']),
        ];
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags = ModelsTags::orderBy('created_at', 'ASC')->paginate(100);
        return view('tags.list', [
            'tags' => $tags,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tags.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:tags|min:3',
        ]);

        if ($validator->passes()) {
            ModelsTags::create(['name' => $request->name]);
            return redirect()->route('tags.list')->with('success', 'Tag Warta Berhasil Ditambahkan.');
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
        $tags = ModelsTags::findOrFail($id);
        return view('tags.edit', [
            'tags' => $tags
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $tags = ModelsTags::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:tags,name, ' . $id . ',id|min:3',
        ]);

        if ($validator->passes()) {
            // Permission::create(['name' => $request->name]);
            $tags->name = $request->name;
            $tags->save();
            return redirect()->route('tags.list')->with('success', 'Tag Warta Berhasil Diupdate.');
        } else {
            return redirect()->route('tags.edit', $id)->withErrors($validator)->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id = $request->id;

        $tags = ModelsTags::find($id);

        if ($tags == null) {
            session()->flash('error', 'Tag Warta not found');
            return response()->json([
                'status' => false
            ]);
        }
        $tags->delete();

        session()->flash('success', 'Tag Warta berhasil dihapus');
        return response()->json([
            'status' => true
        ]);
    }
}
