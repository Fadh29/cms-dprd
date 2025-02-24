<?php

namespace App\Http\Controllers;

use App\Models\Fraksi;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Yajra\DataTables\Facades\DataTables;

class FraksiController extends Controller implements HasMiddleware
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
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $fraksi = Fraksi::latest()->select('id', 'nama');

            return DataTables::of($fraksi)
                ->addIndexColumn()
                ->editColumn('title', function ($fraksi) {
                    return \Str::words($fraksi->title, 10, '...');
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('articles.list');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
