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
                                <label for="kategori" class="text-lg font-medium">Kategori Konten</label>
                                <select name="kategori" id="kategori"
                                    class="border-gray-300 shadow-sm w-full rounded-lg p-2" onchange="toggleReadonly()">
                                    <option value=""
                                        {{ old('kategori', $article->kategori) == '' ? 'selected' : '' }}>Pilih Kategori
                                    </option>
                                    <option value="warta"
                                        {{ old('kategori', $article->kategori) == 'warta' ? 'selected' : '' }}>Warta
                                    </option>
                                    <option value="khusus"
                                        {{ old('kategori', $article->kategori) == 'khusus' ? 'selected' : '' }}>
                                        Kategori
                                        Khusus</option>
                                </select>
                            </div>

                            <div>
                                <label for="spesial_kategori" class="text-lg font-medium">Status Konten</label>
                                <select id="spesial_kategori" class="border-gray-300 shadow-sm w-full rounded-lg p-2">
                                    <option value="" {{ old('spesial_kategori') == '' ? 'selected' : '' }}>Pilih
                                        Status Konten</option>
                                    <option value="terkini"
                                        {{ old('spesial_kategori', $article->spesial_kategori) == 'terkini' ? 'selected' : '' }}>
                                        Terkini</option>
                                    <option value="terpopuler"
                                        {{ old('spesial_kategori', $article->spesial_kategori) == 'terpopuler' ? 'selected' : '' }}>
                                        Terpopuler
                                    </option>
                                    <option value="spesial"
                                        {{ old('spesial_kategori', $article->spesial_kategori) == 'spesial' ? 'selected' : '' }}>
                                        Spesial</option>
                                </select>
                                <input type="hidden" name="spesial_kategori" id="spesial_kategori_hidden"
                                    value="{{ old('spesial_kategori', $article->spesial_kategori) }}">
                            </div>
                            <div>
                                <label for="status_articles" class="text-lg font-medium">Status Publish</label>
                                <select id="status_articles" class="border-gray-300 shadow-sm w-full rounded-lg p-2">
                                    <option value="" {{ old('status_articles') == '' ? 'selected' : '' }}>Pilih
                                        Status Publish</option>
                                    <option value="publish"
                                        {{ old('status_articles', $article->status_articles) == 'publish' ? 'selected' : '' }}>
                                        Publish</option>
                                    <option value="draft"
                                        {{ old('status_articles', $article->status_articles) == 'draft' ? 'selected' : '' }}>
                                        Draft</option>
                                    <option value="validasi"
                                        {{ old('status_articles', $article->status_articles) == 'validasi' ? 'selected' : '' }}>
                                        perlu validasi</option>
                                    <option value="spesial"
                                        {{ old('status_articles', $article->status_articles) == 'spesial' ? 'selected' : '' }}>
                                        Spesial</option>
                                </select>
                                <input type="hidden" name="status_articles" id="status_articles_hidden"
                                    value="{{ old('status_articles', $article->status_articles) }}">
                            </div>

                            <div class="col-span-2">
                                <label for="editor" class="text-lg font-medium">Isi Konten</label>
                                <div class="toolbar-container"></div>
                                <div id="editor" class="border-gray-300 shadow-sm w-full rounded-lg p-2"
                                    contenteditable="true">
                                    {!! old('text', $article->text ?? '') !!}
                                </div>
                                <input type="hidden" name="text" id="editor-content"
                                    value="{{ old('text', $article->text ?? '') }}">
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
        handleKategoriEdit(); // Jalankan saat halaman dimuat

        document.getElementById("kategori").addEventListener("change", function() {
            handleKategoriEdit();
        });
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

    document.addEventListener("DOMContentLoaded", function() {
        updateCounter("summary", "summaryCounter", 250);
        updateCounter("caption", "captionCounter", 200);

        document.getElementById("summary").addEventListener("input", function() {
            updateCounter("summary", "summaryCounter", 250);
        });

        document.getElementById("caption").addEventListener("input", function() {
            updateCounter("caption", "captionCounter", 200);
        });
    });

    function updateCounter(textareaId, counterId, maxLength) {
        let textarea = document.getElementById(textareaId);
        let counter = document.getElementById(counterId);

        if (textarea && counter) {
            let currentLength = textarea.value.length;
            counter.textContent = `${currentLength}/${maxLength}`;

            // Tambah warna merah jika mencapai batas karakter
            if (currentLength >= maxLength) {
                counter.classList.add("text-red-500");
            } else {
                counter.classList.remove("text-red-500");
            }
        }
    }

    document.addEventListener("DOMContentLoaded", function() {
        DecoupledEditor.create(document.querySelector('#editor'))
            .then(editor => {
                const toolbarContainer = document.querySelector('.toolbar-container');
                toolbarContainer.appendChild(editor.ui.view.toolbar.element);

                // Simpan isi editor ke input hidden sebelum submit form
                editor.model.document.on('change:data', () => {
                    document.querySelector("#editor-content").value = editor.getData();
                });

                window.editor = editor;
            })
            .catch(error => {
                console.error('Error initializing CKEditor:', error);
            });

        $('#editor').on('editor.change', function(_, contents) {
            $('#preview').html(contents);
        });

        // Saat halaman dimuat, isi preview dengan teks lama
        let initialContent = $('#editor').ckeditor('code');
        $('#preview').html(initialContent);
    });

    document.addEventListener("DOMContentLoaded", function() {
        let editor = document.getElementById("editor");
        let hiddenInput = document.getElementById("editor-content");

        // Simpan isi editor ke input hidden sebelum form dikirim
        document.querySelector("form").addEventListener("submit", function() {
            hiddenInput.value = editor.innerHTML;
        });
    });

    document.addEventListener("DOMContentLoaded", function() {
        handleKategoriEdit(); // Jalankan saat halaman dimuat

        document.getElementById("kategori")?.addEventListener("change", function() {
            handleKategoriEdit();
        });

        document.getElementById("spesial_kategori")?.addEventListener("change", function() {
            document.getElementById("spesial_kategori_hidden").value = this.value;
        });

        document.getElementById("status_articles")?.addEventListener("change", function() {
            document.getElementById("status_articles_hidden").value = this.value;
        });
    });

    function handleKategoriEdit() {
        let kategori = document.getElementById("kategori");
        let isKhusus = kategori?.value === "khusus";
        let spesialKategori = document.getElementById("spesial_kategori");
        let statusArticles = document.getElementById("status_articles");
        let summary = document.getElementById("summary");
        let caption = document.getElementById("caption");
        let hiddenSpesialKategori = document.getElementById("spesial_kategori_hidden");
        let hiddenStatusArticles = document.getElementById("status_articles_hidden");

        // Jika kategori "khusus", disable dropdown kategori dan set nilai lainnya
        if (isKhusus) {
            kategori.setAttribute("disabled", "true"); // Disable dropdown kategori
            kategori.insertAdjacentHTML("afterend", `<input type="hidden" name="kategori" value="khusus">`);

            spesialKategori.value = "spesial";
            statusArticles.value = "spesial";
            summary.value = "Konten ini termasuk kategori khusus.";
            caption.value = "Konten ini termasuk kategori khusus.";

            spesialKategori.setAttribute("disabled", "true");
            statusArticles.setAttribute("disabled", "true");
            summary.setAttribute("readonly", "true");
            caption.setAttribute("readonly", "true");

            // Simpan nilai agar tetap dikirim ke backend
            hiddenSpesialKategori.value = "spesial";
            hiddenStatusArticles.value = "spesial";
        } else {
            kategori.removeAttribute("disabled"); // Enable kembali dropdown kategori

            spesialKategori.removeAttribute("disabled");
            statusArticles.removeAttribute("disabled");
            summary.removeAttribute("readonly");
            caption.removeAttribute("readonly");

            // Isi value summary dan caption dengan data lama jika bukan kategori "khusus"
            summary.value = summary.value || "{{ old('summary', $article->summary) }}";
            caption.value = caption.value || "{{ old('caption', $article->caption) }}";

            // Hapus opsi "khusus" dari dropdown supaya tidak bisa dipilih lagi
            removeKhususOption(spesialKategori);
            removeKhususOption(statusArticles);

            // Reset hidden values agar tetap dikirim ke backend
            hiddenSpesialKategori.value = spesialKategori.value;
            hiddenStatusArticles.value = statusArticles.value;
        }

        document.querySelectorAll("select option[value='khusus']").forEach(option => {
            if (kategori.value !== "khusus") {
                option.remove();
            }
        });
        document.querySelectorAll("select option[value='spesial']").forEach(option => {
            if (status_articles.value !== "spesial") {
                option.remove();
            }
        });
    }



    function removeKhususOption(selectElement) {
        let options = selectElement?.getElementsByTagName("option");
        for (let i = options.length - 1; i >= 0; i--) {
            if (options[i].value === "khusus") {
                options[i].remove();
            }
        }
    }
</script>
