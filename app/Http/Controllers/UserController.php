<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller implements HasMiddleware
{

    public static function middleware(): array
    {
        return [
            new Middleware('permission:create users', only: ['create']),
            new Middleware('permission:read users', only: ['index']),
            new Middleware('permission:update users', only: ['edit']),
            new Middleware('permission:delete users', only: ['destroy']),
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::latest()->paginate(10);
        return view('user.list', [
            'users' => $users,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::orderBy('name', 'ASC')->get();
        return view('user.create', [
            'roles' => $roles,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:5|same:confirm_password',
            'confirm_password' => 'required',
        ], [
            'name.required' => 'Nama pengguna harus diisi.',
            'name.min' => 'Nama pengguna harus memiliki minimal 3 karakter.',

            'email.required' => 'Email pengguna harus diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email ini sudah terdaftar.',

            'password.required' => 'Password harus diisi.',
            'password.min' => 'Password harus memiliki minimal 5 karakter.',
            'password.same' => 'Password dan Konfirmasi Password harus sama.',

            'confirm_password.required' => 'Konfirmasi Password harus diisi.',
        ]);

        if ($validator->fails()) {
            return redirect()->route('users.create')->withInput()->withErrors($validator);
        }

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        $user->syncRoles($request->role);

        return redirect()->route('users.list')->with('success', 'User berhasil ditambahkan.');
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
        $user = User::findOrFail($id);
        $roles = Role::orderBy('name', 'ASC')->get();

        $hasRoles = $user->roles->pluck('id');
        // dd($hasRoles);
        return view('user.edit', [
            'user' => $user,
            'roles' => $roles,
            'hasRoles' => $hasRoles,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, Request $request)
    {
        $user = User::findOrFail($id);

        // Cek apakah email berubah
        $emailRule = ($request->email === $user->email)
            ? 'required|email'
            : 'required|email|unique:users,email';

        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3',
            'email' => $emailRule,
            'password' => 'nullable|same:confirm_password', // Password bisa kosong jika tidak diubah
            'confirm_password' => 'nullable|required_with:password', // Konfirmasi hanya wajib jika password diisi
        ], [
            'name.required' => 'Nama pengguna harus diisi.',
            'name.min' => 'Nama pengguna harus memiliki minimal 3 karakter.',

            'email.required' => 'Email pengguna harus diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email ini sudah terdaftar.',

            'password.same' => 'Password dan Konfirmasi Password harus sama.',
            'confirm_password.required_with' => 'Konfirmasi Password harus diisi jika ingin mengubah password.',
        ]);

        if ($validator->fails()) {
            return redirect()->route('users.edit', $id)->withInput()->withErrors($validator);
        }

        // Cek apakah ada perubahan sebelum menyimpan
        $hasChanges = false;

        if ($user->name !== $request->name) {
            $user->name = $request->name;
            $hasChanges = true;
        }

        if ($user->email !== $request->email) {
            $user->email = $request->email;
            $hasChanges = true;
        }

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
            $hasChanges = true;
        }

        if ($hasChanges) {
            $user->save();
        }

        // Perbarui roles jika ada perubahan
        if ($request->has('role')) {
            $user->syncRoles($request->role);
        }

        return redirect()->route('users.list')->with('success', 'User berhasil diperbarui.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $Users = User::find($id);

        if ($Users == null) {
            session()->flash('error', 'Users not found');
            return response()->json([
                'status' => false
            ]);
        }
        $Users->delete();

        session()->flash('success', 'Users berhasil dihapus');
        return response()->json([
            'status' => true
        ]);
    }
}
