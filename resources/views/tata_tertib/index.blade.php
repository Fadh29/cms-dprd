<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Tata Tertib
            </h2>
            <a href="{{ route('dashboard') }}" class="bg-slate-700 text-sm rounded-md text-white px-5 py-2">Back</a>
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

                    <!-- Form -->
                    <form action="{{ route('tata_tertib.store') }}" method="POST">
                        @csrf
                        <div>
                            <label for="summernoteTupoksi" class="text-lg font-medium">Tata Tertib</label>
                            <div class="my-3">
                                <textarea id="summernoteTupoksi" name="deskripsi" placeholder="Masukkan Tata Tertib"
                                    class="border-gray-300 shadow-sm w-1/2 rounded-lg" rows="10">{{ old('deskripsi', $tataTertib->deskripsi ?? '') }}</textarea>
                            </div>
                            <button type="submit"
                                class="bg-slate-700 text-sm rounded-md text-white px-5 py-3">Submit</button>
                        </div>
                    </form>

                    <!-- Preview Section -->
                    <div class="mt-8">
                        <h2 class="text-lg font-semibold">Preview:</h2>
                        <div id="preview" class="p-4 border border-gray-300 bg-white rounded-md">
                            <p class="text-gray-700">Hasil dari input akan tampil di sini...</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<script>
    $(document).ready(function() {
    // Inisialisasi Summernote
    $('#summernoteTupoksi').summernote({
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
    $('#summernoteTupoksi').on('summernote.change', function(_, contents) {
        $('#preview').html(contents);
    });

    // Saat halaman dimuat, isi preview dengan teks lama
    let initialContent = $('#summernoteTupoksi').summernote('code');
    $('#preview').html(initialContent);
});
</script>
