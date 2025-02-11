<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Permissions / Create
            </h2>
            <a href="{{ route('permissions.index') }}"
                class="bg-slate-700 text-sm rounded-md text-white px-5 py-2">Back</a>
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
                    <form action="{{ route('permissions.store') }}" method="post">
                        @csrf
                        <div>
                            <label for="" class="text-lg font-medium">Nama</label>
                            <div class="my-3">
                                <input value="{{ old('name') }}" name="name" placeholder="Masukkan Nama"
                                    type="text" class="border-gray-300 shadow-sm w-1/2 rounded-lg">
                                {{-- @error('name')
                                    <p class="text-red-400 font-medium">{{ $message }}</p>
                                @enderror --}}
                            </div>

                            <label class="text-lg font-medium">Permissions</label>
                            <div class="my-3">
                                @foreach (['create', 'read', 'update', 'delete'] as $perm)
                                    <label class="inline-flex items-center">
                                        <input type="checkbox" name="permissions[]" value="{{ $perm }}"
                                            class="border-gray-300 shadow-sm rounded">
                                        <span class="ml-2 text-gray-700 capitalize">{{ $perm }}</span>
                                    </label>
                                @endforeach
                                {{-- @error('permissions')
                                    <p class="text-red-400 font-medium">{{ $message }}</p>
                                @enderror --}}
                            </div>

                            <button class="bg-slate-700 text-sm rounded-md text-white px-5 py-3">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
