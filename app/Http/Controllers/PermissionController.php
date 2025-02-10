<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Spatie\Permission\Models\Permission;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

// class PermissionController extends Controller
class PermissionController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('permission:create permissions', only: ['create']),
            new Middleware('permission:read permissions', only: ['index']),
            new Middleware('permission:update permissions', only: ['edit']),
            new Middleware('permission:delete permissions', only: ['destroy']),
        ];
    }

    public function index()
    {
        $permissions = Permission::orderBy('created_at', 'ASC')->paginate(100);
        return view('permissions.list', [
            'permissions' => $permissions
        ]);
    }

    public function create()
    {
        return view('permissions.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:permissions|min:3',
        ]);

        if ($validator->passes()) {
            Permission::create(['name' => $request->name]);
            return redirect()->route('permissions.index')->with('success', 'Permissions Berhasil Ditambahkan.');
        } else {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    }

    public function edit($id)
    {
        $permissions = Permission::findOrFail($id);
        return view('permissions.edit', [
            'permissions' => $permissions
        ]);
    }

    public function update($id, Request $request)
    {
        $permissions = Permission::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:permissions,name, ' . $id . ',id|min:3',
        ]);

        if ($validator->passes()) {
            // Permission::create(['name' => $request->name]);
            $permissions->name = $request->name;
            $permissions->save();
            return redirect()->route('permissions.index')->with('success', 'Permissions Berhasil Diupdate.');
        } else {
            return redirect()->route('permissions.edit', $id)->withErrors($validator)->withInput();
        }
    }

    public function destroy(Request $request)
    {
        $id = $request->id;

        $permissions = Permission::find($id);

        if ($permissions == null) {
            session()->flash('error', 'Permission not found');
            return response()->json([
                'status' => false
            ]);
        }
        $permissions->delete();

        session()->flash('success', 'Permission berhasil dihapus');
        return response()->json([
            'status' => true
        ]);
    }
}
