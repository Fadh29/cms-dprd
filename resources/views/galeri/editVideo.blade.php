<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Video / Edit
            </h2>
            <a href="{{ route('video.list') }}" class="bg-slate-700 text-sm rounded-md text-white px-5 py-2">Back</a>
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

                    <form action="{{ route('video.update', $video->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="grid grid-cols-2 gap-6">
                            <div>
                                <label for="judul" class="text-lg font-medium">Judul</label>
                                <input value="{{ old('judul', $video->judul) }}" name="judul" type="text"
                                    class="border-gray-300 shadow-sm w-full rounded-lg p-2"
                                    placeholder="Masukkan Judul Video">
                            </div>
                            <div>
                                <label for="tags" class="text-lg font-medium">Tags/Kata Kunci</label>
                                <input id="tags" name="tags" type="text"
                                    class="border-gray-300 shadow-sm w-full rounded-lg advance-options"
                                    value="{{ old('tags', $video->tags) }}" placeholder="Tags">
                            </div>
                            <div>
                                <label for="tanggal_unggah" class="text-lg font-medium">Tanggal Publish</label>
                                <input value="{{ old('tanggal_unggah', $video->tanggal_unggah) }}" name="tanggal_unggah"
                                    type="date" class="border-gray-300 shadow-sm w-full rounded-lg p-2">
                            </div>
                            <div>
                                <label for="status_foto" class="text-lg font-medium">Status Publish</label>
                                <select id="status_foto" name="status_foto"
                                    class="border-gray-300 shadow-sm w-full rounded-lg p-2"
                                    onchange="updateStatusColor()">
                                    <option value="validasi" {{ $video->status_foto == 'validasi' ? 'selected' : '' }}>
                                        Perlu Validasi</option>
                                    <option value="publish" {{ $video->status_foto == 'publish' ? 'selected' : '' }}>
                                        Publish</option>
                                    <option value="draft" {{ $video->status_foto == 'draft' ? 'selected' : '' }}>Draft
                                    </option>
                                </select>
                            </div>
                            <div>
                                <label for="tanggal_publish_mulai" class="text-lg font-medium">Tanggal Mulai
                                    Publish</label>
                                <input value="{{ old('tanggal_publish_mulai', $video->tanggal_publish_mulai) }}"
                                    name="tanggal_publish_mulai" type="date"
                                    class="border-gray-300 shadow-sm w-full rounded-lg p-2">
                            </div>
                            <div>
                                <label for="tanggal_publis_selesai" class="text-lg font-medium">Tanggal Selesai
                                    Publish</label>
                                <input value="{{ old('tanggal_publis_selesai', $video->tanggal_publis_selesai) }}"
                                    name="tanggal_publis_selesai" type="date"
                                    class="border-gray-300 shadow-sm w-full rounded-lg p-2">
                            </div>
                            <div class="col-span-2">
                                <label for="editor" class="text-lg font-medium">Deskripsi Video</label>
                                <div class="toolbar-container"></div>
                                <div id="editor" class="border-gray-300 shadow-sm w-full rounded-lg p-2">
                                    {!! old('deskripsi', $video->deskripsi) !!}
                                </div>
                                <input type="hidden" name="deskripsi" id="editor-content"
                                    value="{{ old('deskripsi', $video->deskripsi) }}">
                            </div>
                            <div class="col-span-2">
                                <label for="url" class="text-lg font-medium">Masukkan URL Video</label>
                                <input id="video-url" value="{{ old('url', $video->url) }}" name="url"
                                    type="text" class="border-gray-300 shadow-sm w-full rounded-lg p-2"
                                    placeholder="Masukkan URL YouTube">

                                <iframe id="video-iframe" class="w-full rounded-lg" height="315"
                                    src="{{ $video->youtube_id ? 'https://www.youtube.com/embed/' . $video->youtube_id : '' }}"
                                    frameborder="0" allowfullscreen>
                                </iframe>

                            </div>
                        </div>
                        <div class="mt-6 text-right">
                            <button class="bg-slate-700 text-sm rounded-md text-white px-5 py-3">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    function updateStatusColor() {
        const selectElement = document.getElementById('status_foto');
        selectElement.classList.remove('bg-green-300', 'bg-yellow-300', 'bg-red-300');
        if (selectElement.value === 'publish') {
            selectElement.classList.add('bg-green-300');
        } else if (selectElement.value === 'validasi') {
            selectElement.classList.add('bg-red-300');
        } else if (selectElement.value === 'draft') {
            selectElement.classList.add('bg-yellow-300');
        }
    }
    document.addEventListener('DOMContentLoaded', function() {
        updateStatusColor();
    });

    document.addEventListener('DOMContentLoaded', function() {
        const videoUrlInput = document.getElementById('video-url');
        const videoPreview = document.getElementById('video-preview');
        const videoIframe = document.getElementById('video-iframe');

        videoUrlInput.addEventListener('input', function() {
            const url = videoUrlInput.value;
            const videoId = extractVideoId(url);

            if (videoId) {
                videoIframe.src = `https://www.youtube.com/embed/${videoId}`;
                videoPreview.classList.remove('hidden');
            } else {
                videoIframe.src = '';
                videoPreview.classList.add('hidden');
            }
        });

        function extractVideoId(url) {
            const regex =
                /(?:https?:\/\/)?(?:www\.)?(?:youtube\.com\/(?:[^\/\n\s]+\/\S+\/|(?:v|e(?:mbed)?|watch)\/|.*[?&]v=)|youtu\.be\/)([a-zA-Z0-9_-]{11})/;
            const match = url.match(regex);
            return match ? match[1] : null;
        }
    });

    document.addEventListener("DOMContentLoaded", function() {
        DecoupledEditor.create(document.querySelector("#editor"))
            .then(editor => {
                document.querySelector(".toolbar-container").appendChild(editor.ui.view.toolbar.element);
                editor.model.document.on("change:data", () => {
                    document.querySelector("#editor-content").value = editor.getData();
                });
                window.editor = editor;
            })
            .catch(error => {
                console.error("Error initializing CKEditor:", error);
            });
    });
</script>
