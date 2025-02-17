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
                        <div class="grid grid-cols-2 gap-6">
                            <div>
                                <label for="title" class="text-lg font-medium">Judul</label>
                                <input value="{{ old('title', $article->title) }}" name="title"
                                    placeholder="Masukkan Judul Artikel" type="text"
                                    class="border-gray-300 shadow-sm w-full rounded-lg p-2">
                            </div>

                            <div>
                                <label for="author" class="text-lg font-medium">Penulis</label>
                                <input value="{{ old('author', $article->author) }}" name="author"
                                    placeholder="Masukkan Nama Penulis" type="text"
                                    class="border-gray-300 shadow-sm w-full rounded-lg p-2">
                            </div>

                            <div>
                                <label for="caption_image" class="text-lg font-medium">Caption Gambar</label>
                                <input value="{{ old('fotografer', $article->fotografer) }}" name="fotografer"
                                    placeholder="Masukkan Nama Fotografer" type="text"
                                    class="border-gray-300 shadow-sm w-full rounded-lg p-2">
                            </div>
                            <div>
                                <label for="tags" class="text-lg font-medium">Tags/Kata Kunci</label>
                                <input id="tags" name="tags" placeholder="Tags" type="text"
                                    class="border-gray-300 shadow-sm w-full rounded-lg advance-options"
                                    value="{{ old('tags', implode(',', json_decode($article->tags))) }}">
                            </div>
                            <div>
                                <label for="tgl_publish" class="text-lg font-medium">Tanggal Publish</label>
                                <input value="{{ old('tgl_publish', $article->tgl_publish) }}" name="tgl_publish"
                                    placeholder="Tanggal Publish" type="date"
                                    class="border-gray-300 shadow-sm w-full rounded-lg p-2">
                                @error('tgl_publish')
                                    <p class="text-red-400 font-medium">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="status_articles" class="text-lg font-medium">Status Publish</label>
                                <select name="status_articles" id="status_articles"
                                    class="border-gray-300 shadow-sm w-full rounded-lg p-2">
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

                            <div class="col-span-2">
                                <label for="text" class="text-lg font-medium">Isi Konten</label>
                                <textarea name="text" placeholder="Masukkan Deskripsi Artikel" id="summernoteWarta"
                                    class="border-gray-300 shadow-sm w-full rounded-lg p-2" rows="10">{{ old('text', $article->text) }}</textarea>
                            </div>

                            <div class="col-span-2 relative">
                                <label for="summary" class="text-lg font-medium">Ringkasan/Summary</label>
                                <div class="relative">
                                    <textarea name="summary" id="summary" placeholder="Masukkan Summary Artikel"
                                        class="border-gray-300 shadow-sm w-full rounded-lg p-2 resize-y min-h-[100px]" maxlength="250"
                                        oninput="updateCounter('summary', 'summaryCounter', 250)">{{ old('summary', $article->summary) }}</textarea>
                                    <span id="summaryCounter"
                                        class="absolute bottom-2 right-3 text-gray-400 text-sm bg-white px-1">0/250</span>
                                </div>
                            </div>

                            <div class="col-span-2 relative">
                                <label for="caption" class="text-lg font-medium">Caption</label>
                                <div class="relative">
                                    <textarea name="caption" id="caption" placeholder="Masukkan Caption Artikel"
                                        class="border-gray-300 shadow-sm w-full rounded-lg p-2 resize-y min-h-[100px]" maxlength="200"
                                        oninput="updateCounter('caption', 'captionCounter', 200)">{{ old('caption', $article->caption) }}</textarea>
                                    <span id="captionCounter"
                                        class="absolute bottom-2 right-3 text-gray-400 text-sm bg-white px-1">0/200</span>
                                </div>
                            </div>


                            <!-- Input File -->
                            <div>
                                <label for="file" class="text-lg font-medium">Upload Image</label>
                                <input type="file" name="file[]" id="file"
                                    class="border-gray-300 shadow-sm w-full rounded-lg p-2" multiple>
                            </div>

                            <!-- Preview Gambar Lama -->
                            <!-- Tampilkan Gambar yang Sudah Diupload -->
                            <div id="preview" class="mt-4">
                                @if ($article->getMedia('images')->isNotEmpty())
                                    @foreach ($article->getMedia('images') as $image)
                                        <img src="{{ $image->getFullUrl() }}"
                                            class="preview-image w-40 h-40 object-cover rounded-md shadow-md mt-3">
                                    @endforeach
                                @else
                                    <p class="text-gray-500">Belum ada gambar yang diunggah.</p>
                                @endif
                            </div>
                        </div>
                        <div class="mt-6 text-right">
                            <button class="bg-slate-700 text-sm rounded-md text-white px-5 py-3">Submit</button>
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

    document.addEventListener('DOMContentLoaded', function() {
        const fileInput = document.getElementById('file');
        const previewContainer = document.getElementById('preview');

        fileInput.addEventListener('change', function(event) {
            const files = event.target.files;
            previewContainer.innerHTML = ''; // Hapus preview lama saat memilih gambar baru

            for (let i = 0; i < files.length; i++) {
                const file = files[i];
                if (file.type.startsWith('image/')) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const img = document.createElement('img');
                        img.src = e.target.result;
                        img.classList.add('w-40', 'h-40', 'object-cover', 'rounded-md', 'shadow-md',
                            'mt-3');
                        previewContainer.appendChild(img);
                    };
                    reader.readAsDataURL(file);
                }
            }
        });
    });

    $(document).ready(function() {
        // Inisialisasi Summernote
        $('#summernoteWarta').summernote({
            height: 300,
            placeholder: 'Masukkan deskripsi tupoksi...',
            toolbar: [
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });

        // Update preview saat Summernote berubah
        // $('#summernoteWarta').on('summernote.change', function(_, contents) {
        //     $('#preview').html(contents);
        // });

        // Saat halaman dimuat, isi preview dengan teks lama
        let initialContent = $('#summernoteWarta').summernote('code');
        // $('#preview').html(initialContent);
    });
</script>
