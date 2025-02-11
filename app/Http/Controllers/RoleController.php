<?php

namespace App\Http\Controllers;

use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Spatie\Permission\Models\Role;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

// class RoleController extends Controller
class RoleController extends Controller implements HasMiddleware
{

    public static function middleware(): array
    {
        return [
            new Middleware('permission:create roles', only: ['create']),
            new Middleware('permission:read roles', only: ['index']),
            new Middleware('permission:update roles', only: ['edit']),
            new Middleware('permission:delete roles', only: ['destroy']),
        ];
    }

    // public function index() {
    //     $roles = Role::orderBy('name', 'ASC')->paginate(10);
    //     dd($roles);
    //     return view('roles.list', [
    //         'roles' => $roles
    //     ]);
    // }

    public function index()
    {
        $roles = Role::orderBy('name', 'ASC')->paginate(10);
        return view('roles.list', [
            'roles' => $roles
        ]);
    }


    public function create()
    {
        $permissions = Permission::orderBy('name', 'ASC')->get();
        return view('roles.create', [
            'permissions' => $permissions
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:roles|min:3',
        ], [
            'name.required' => 'Nama roles harus diisi.',
            'name.min' => 'Nama roles minimal 3 karakter.',
        ]);

        if ($validator->passes()) {
            $role = Role::create(['name' => $request->name]);
            if (!empty($request->permission)) {
                foreach ($request->permission as $name) {
                    $role->givePermissionTo($name);
                }
            }
            return redirect()->route('roles.list')->with('success', 'Roles Berhasil Ditambahkan.');
        } else {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    }

    public function edit($id)
    {
        $role = Role::findOrFail($id);
        $hasPermissions = $role->permissions->pluck('name');

        // Mengambil semua permissions dan mengelompokkannya berdasarkan kata kedua
        $permissions = Permission::orderBy('name', 'ASC')->get();
        $groupedPermissions = $permissions->groupBy(function ($item) {
            // Mengambil kata kedua dari nama permission
            $words = explode(' ', $item->name);
            return implode(' ', array_slice($words, 1)); // Menggunakan kata kedua sebagai grup
        });

        return view('roles.edit', [
            'groupedPermissions' => $groupedPermissions,
            'hasPermissions' => $hasPermissions,
            'role' => $role
        ]);
    }


    // public function update($id, Request $request)
    // {
    //     $role = Role::findOrFail($id);
    //     $validator = Validator::make($request->all(), [
    //         'name' => 'required|unique:roles,name,' . $id . ',id',
    //     ]);

    //     if ($validator->passes()) {
    //         // $role = Role::create(['name' => $request->name]);
    //         $role->name = $request->name;
    //         // dd($role);
    //         $role->save();

    //         if (!empty($request->permission)) {
    //             $role->syncPermissions($request->permissions);
    //         } else {
    //             $role->syncPermissions([]);
    //         }

    //         return redirect()->route('roles.list')->with('success', 'Roles Berhasil Diubah.');
    //     } else {
    //         return redirect()->route('roles.edit', $id)->withErrors($validator)->withInput();
    //     }
    // }

    public function update($id, Request $request)
    {
        $role = Role::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:roles,name,' . $id . ',id',
        ]);

        if ($validator->passes()) {
            $role->name = $request->name;
            $role->save();

            if (!empty($request->permission)) {
                // Menggunakan sync untuk menambahkan permission baru tanpa menghapus yang sudah ada
                $role->syncPermissions($request->permission);
            } else {
                // Jika tidak ada permission yang dipilih, hapus semua permission
                $role->syncPermissions([]);
            }

            return redirect()->route('roles.list')->with('success', 'Roles Berhasil Diubah.');
        } else {
            return redirect()->route('roles.edit', $id)->withErrors($validator)->withInput();
        }
    }

    public function destroy($id)
    {
        $role = Role::find($id);

        if ($role == null) {
            session()->flash('error', 'Roles not found');
            return response()->json([
                'status' => false
            ]);
        }
        $role->delete();

        session()->flash('success', 'Roles berhasil dihapus');
        return response()->json([
            'status' => true
        ]);
    }
}
