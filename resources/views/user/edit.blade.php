<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Users / Edit
            </h2>
            <a href="{{ route('users.list') }}" class="bg-slate-700 text-sm rounded-md text-white px-5 py-2">Back</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if ($errors->any())
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative my-3"
                            role="alert">
                            <strong class="font-bold">Terjadi kesalahan!</strong>
                            <ul class="mt-2">
                                @foreach ($errors->all() as $error)
                                    <li>- {{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('users.update', $user->id) }}" method="post">
                        @csrf

                        <div>
                            <label for="" class="text-lg font-medium">Nama</label>
                            <div class="my-3">
                                <input value="{{ old('name', $user->name) }}" name="name" placeholder="Masukkan Nama"
                                    type="text" class="border-gray-300 shadow-sm w-1/2 rounded-lg">
                                {{-- @error('name')
                                    <p class="text-red-400 font-medium">{{ $message }}</p>
                                @enderror --}}
                            </div>
                            <label for="" class="text-lg font-medium">Email</label>
                            <div class="my-3">
                                <input value="{{ old('email', $user->email) }}" name="email"
                                    placeholder="Masukkan Email" type="text"
                                    class="border-gray-300 shadow-sm w-1/2 rounded-lg">
                                {{-- @error('email')
                                    <p class="text-red-400 font-medium">{{ $message }}</p>
                                @enderror --}}
                            </div>
                            <label for="" class="text-lg font-medium">Password</label>
                            <div class="my-3">
                                <input value="{{ old('password') }}" name="password" placeholder="Masukkan Password"
                                    type="password" class="border-gray-300 shadow-sm w-1/2 rounded-lg">
                                {{-- @error('password')
                                    <p class="text-red-400 font-medium">{{ $message }}</p>
                                @enderror --}}
                            </div>
                            <label for="" class="text-lg font-medium">Masukkan Kembali Password</label>
                            <div class="my-3">
                                <input value="{{ old('confirm_password') }}" name="confirm_password"
                                    placeholder="Masukkan Kembali Password" type="password"
                                    class="border-gray-300 shadow-sm w-1/2 rounded-lg">
                                {{-- @error('confirm_password')
                                    <p class="text-red-400 font-medium">{{ $message }}</p>
                                @enderror --}}
                            </div>

                            <div class="grid grid-cols-4 mb-3">
                                <div class="mt-3">
                                    @if ($roles->isNotEmpty())
                                        @foreach ($roles as $role)
                                            <div class="mt-3">

                                                <input {{ $hasRoles->contains($role->id) ? 'checked' : '' }}
                                                    type="checkbox" id="role-{{ $role->id }}" class="rounded"
                                                    name="role[]" value="{{ $role->name }}">
                                                {{-- name="role[]" value="{{ old('name', $role->name) }}"> --}}
                                                <label for="role-{{ $role->id }}">{{ $role->name }}</label>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>

                            <button class="bg-slate-700 text-sm rounded-md text-white px-5 py-3">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
