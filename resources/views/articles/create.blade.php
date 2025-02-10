<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Articles / Create
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
                    <form action="{{ route('articles.store') }}" method="post">
                        @csrf
                        <div>
                            <label for="title" class="text-lg font-medium">Judul</label>
                            <div class="my-3">
                                <input value="{{ old('title') }}" name="title" placeholder="Masukkan Judul Artikel"
                                    type="text" class="border-gray-300 shadow-sm w-1/2 rounded-lg">
                                @error('title')
                                    <p class="text-red-400 font-medium">{{ $message }}</p>
                                @enderror
                            </div>
                            <label for="title" class="text-lg font-medium">Deskripsi</label>
                            <div class="my-3">
                                <textarea name="text" placeholder="Masukkan Deskripsi Artikel" class="border-gray-300 shadow-sm w-1/2 rounded-lg"
                                    id="text" cols="30" rows="10">{{ old('text') }}</textarea>
                                @error('text')
                                    <p class="text-red-400 font-medium">{{ $message }}</p>
                                @enderror
                            </div>
                            <label for="title" class="text-lg font-medium">Author</label>
                            <div class="my-3">
                                <input value="{{ old('author') }}" name="author" placeholder="Masukkan Pembuat Artikel"
                                    type="text" class="border-gray-300 shadow-sm w-1/2 rounded-lg">
                                @error('author')
                                    <p class="text-red-400 font-medium">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <label for="title" class="text-lg font-medium">Tag Warta</label>
                        <div class="grid grid-cols-4 mb-3">
                            <div class="mt-3">
                                @if ($tags->isNotEmpty())
                                    @foreach ($tags as $tag)
                                        <div class="mt-3">
                                            <input type="checkbox" id="tag-{{ $tag->id }}" class="rounded"
                                                name="tags_id[]" value="{{ $tag->id }}">
                                            <label for="tag-{{ $tag->id }}">{{ $tag->name }}</label>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <button class="bg-slate-700 text-sm rounded-md text-white px-5 py-3">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
