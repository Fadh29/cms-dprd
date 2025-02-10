<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                articles / Edit
            </h2>
            <a href="{{ route('articles.list') }}" class="bg-slate-700 text-sm rounded-md text-white px-5 py-2">Back</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('articles.update', $article->id) }}" method="post">
                        @csrf
                        <div>
                            <label for="title" class="text-lg font-medium">Judul</label>
                            <div class="my-3">
                                <input value="{{ old('title', $article->title) }}" name="title"
                                    placeholder="Masukkan Judul Artikel" type="text"
                                    class="border-gray-300 shadow-sm w-1/2 rounded-lg">
                                @error('title')
                                    <p class="text-red-400 font-medium">{{ $message }}</p>
                                @enderror
                            </div>

                            <label for="text" class="text-lg font-medium">Deskripsi</label>
                            <div class="my-3">
                                <textarea name="text" placeholder="Masukkan Deskripsi Artikel" class="border-gray-300 shadow-sm w-1/2 rounded-lg"
                                    id="text" cols="30" rows="10">{{ old('text', $article->text) }}</textarea>
                                @error('text')
                                    <p class="text-red-400 font-medium">{{ $message }}</p>
                                @enderror
                            </div>

                            <label for="author" class="text-lg font-medium">Penulis</label>
                            <div class="my-3">
                                <input value="{{ old('author', $article->author) }}" name="author"
                                    placeholder="Masukkan Nama Penulis" type="text"
                                    class="border-gray-300 shadow-sm w-1/2 rounded-lg">
                                @error('author')
                                    <p class="text-red-400 font-medium">{{ $message }}</p>
                                @enderror
                            </div>
                            <label for="tags" class="text-lg font-medium">Tag Warta</label>
                            <div class="grid grid-cols-4 mb-3">
                                <div class="mt-3">
                                    @if ($tags->isNotEmpty())
                                        @foreach ($tags as $tag)
                                            <div class="mt-3">
                                                <input type="checkbox" id="tag-{{ $tag->id }}" class="rounded"
                                                    name="tags_id[]" value="{{ $tag->id }}"
                                                    {{ in_array($tag->id, $articleTags) ? 'checked' : '' }}>
                                                <label for="tag-{{ $tag->id }}">{{ $tag->name }}</label>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                            <button
                                class="bg-slate-700 hover:bg-slate-600 text-sm rounded-md text-white px-5 py-3">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
