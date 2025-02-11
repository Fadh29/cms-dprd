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
                    <form action="{{ route('articles.update', $article->id) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="flex flex-col space-y-4">
                            <div class="flex justify-between items-center">
                                <label for="title" class="text-lg font-medium">Judul</label>
                                <input value="{{ old('title', $article->title) }}" name="title"
                                    placeholder="Masukkan Judul Artikel" type="text"
                                    class="border-gray-300 shadow-sm w-1/2 rounded-lg">
                            </div>

                            <div class="flex justify-between items-center">
                                <label for="text" class="text-lg font-medium">Deskripsi</label>
                                <textarea name="text" placeholder="Masukkan Deskripsi Artikel" class="border-gray-300 shadow-sm w-1/2 rounded-lg">{{ old('text', $article->text) }}</textarea>
                            </div>

                            <div class="flex justify-between items-center">
                                <label for="author" class="text-lg font-medium">Penulis</label>
                                <input value="{{ old('author', $article->author) }}" name="author"
                                    placeholder="Masukkan Nama Penulis" type="text"
                                    class="border-gray-300 shadow-sm w-1/2 rounded-lg">
                            </div>

                            <div class="flex justify-between items-center">
                                <label for="summary" class="text-lg font-medium">Summary</label>
                                <div class="relative w-1/2">
                                    <textarea name="summary" id="summary" placeholder="Masukkan Summary Artikel"
                                        class="border-gray-300 shadow-sm w-full rounded-lg pr-12 pb-6" maxlength="250"
                                        oninput="updateCounter('summary', 'summaryCounter', 250)">{{ old('summary', $article->summary) }}</textarea>
                                    <span id="summaryCounter"
                                        class="absolute bottom-2 right-3 text-gray-400 text-sm">0/250</span>
                                </div>
                            </div>

                            <div class="flex justify-between items-center">
                                <label for="caption" class="text-lg font-medium">Caption</label>
                                <div class="relative w-1/2">
                                    <textarea name="caption" id="caption" placeholder="Masukkan Caption Artikel"
                                        class="border-gray-300 shadow-sm w-full rounded-lg pr-12 pb-6" maxlength="200"
                                        oninput="updateCounter('caption', 'captionCounter', 200)">{{ old('caption', $article->caption) }}</textarea>
                                    <span id="captionCounter"
                                        class="absolute bottom-2 right-3 text-gray-400 text-sm">0/200</span>
                                </div>
                            </div>

                            <div class="flex justify-between items-center">
                                <label for="fotografer" class="text-lg font-medium">Fotografer</label>
                                <input value="{{ old('fotografer', $article->fotografer) }}" name="fotografer"
                                    placeholder="Masukkan Nama Fotografer" type="text"
                                    class="border-gray-300 shadow-sm w-1/2 rounded-lg">
                            </div>

                            <div class="flex justify-between items-center">
                                <label for="status_articles" class="text-lg font-medium">Status Artikel</label>
                                <select name="status_articles" id="status_articles"
                                    class="border-gray-300 shadow-sm w-1/2 rounded-lg bg-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                    onchange="updateStatusColor()">
                                    <option value="">Pilih Status</option>
                                    <option value="publish"
                                        {{ old('status_articles', $article->status_articles) == 'publish' ? 'selected' : '' }}>
                                        Publish</option>
                                    <option value="draft"
                                        {{ old('status_articles', $article->status_articles) == 'draft' ? 'selected' : '' }}>
                                        Draft</option>
                                    <option value="validasi"
                                        {{ old('status_articles', $article->status_articles) == 'validasi' ? 'selected' : '' }}>
                                        perlu validasi</option>
                                </select>
                            </div>
                            <div class="flex justify-between items-center">
                                <label for="tags" class="text-lg font-medium">Tag</label>
                                <div class="w-1/2">
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
                            <div class="flex justify-between items-center">
                                <label for="file" class="text-lg font-medium">Unggah Foto Warta</label>
                                <input type="file" name="file[]" id="file"
                                    class="border-gray-300 shadow-sm w-1/2 rounded-lg" multiple>
                            </div>

                            <div id="preview" class="mt-4">
                                <!-- Preview gambar yang sudah diunggah -->
                                @if ($mediaItems->count() > 0)
                                    @foreach ($mediaItems as $media)
                                        <div class="w-full h-auto block mx-auto mb-4 relative">
                                            <img src="{{ $media->getUrl() }}" alt="Preview"
                                                class="w-full h-auto block mx-auto">
                                            <button type="button"
                                                class="absolute top-2 right-2 bg-red-500 text-white px-2 py-1 rounded-full"
                                                onclick="removeMedia('{{ $media->id }}')">X</button>
                                        </div>
                                    @endforeach
                                @endif
                            </div>

                            <!-- Preview gambar baru yang diunggah -->
                            <div id="new-preview" class="mt-4">
                                <!-- Preview gambar baru akan ditampilkan di sini -->
                            </div>
                        </div>

                        <div class="flex justify-end">
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg">Perbarui
                                Artikel</button>
                        </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>
<script>
    function updateCounter(textareaId, counterId, maxLength) {
        const textarea = document.getElementById(textareaId);
        const counter = document.getElementById(counterId);
        const currentLength = textarea.value.length;
        counter.textContent = `${currentLength}/${maxLength} karakter`;
    }

    function updateStatusColor() {
        const selectElement = document.getElementById('status_articles');
        const selectedValue = selectElement.value;
        const selectClass = selectElement.classList;

        // Hapus kelas warna sebelumnya
        selectClass.remove('bg-green-300', 'bg-yellow-300', 'bg-red-300');

        // Tambahkan kelas warna baru berdasarkan nilai yang dipilih
        if (selectedValue === 'publish') {
            selectClass.add('bg-green-300');
        } else if (selectedValue === 'validasi') {
            selectClass.add('bg-red-300');
        } else if (selectedValue === 'draft') {
            selectClass.add('bg-yellow-300');
        }
    }

    // Inisialisasi warna saat halaman dimuat
    document.addEventListener('DOMContentLoaded', function() {
        updateStatusColor();
    });

    // Perbarui warna saat pilihan berubah
    document.getElementById('status_articles').addEventListener('change', updateStatusColor);

    document.getElementById('file').addEventListener('change', function(event) {
        const files = event.target.files;
        const previewContainer = document.getElementById('new-preview');
        previewContainer.innerHTML = ''; // Kosongkan kontainer preview sebelumnya

        for (let i = 0; i < files.length; i++) {
            const file = files[i];
            const reader = new FileReader();

            reader.onload = function(e) {
                const img = document.createElement('img');
                img.src = e.target.result;
                img.classList.add('w-full', 'h-auto', 'block', 'mx-auto', 'mb-4');
                previewContainer.appendChild(img);
            };

            reader.readAsDataURL(file);
        }
    });

    document.querySelectorAll('.delete-media').forEach(button => {
        button.addEventListener('click', function() {
            const mediaId = this.getAttribute('data-media-id');
            const mediaToDeleteInput = document.getElementById('media-to-delete');
            const currentValues = mediaToDeleteInput.value.split(',').filter(id => id !== '');
            currentValues.push(mediaId);
            mediaToDeleteInput.value = currentValues.join(',');

            this.parentElement.remove();
        });
    });
</script>
