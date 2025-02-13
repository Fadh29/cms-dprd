<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Agenda / Create
            </h2>
            <a href="{{ route('agenda.list') }}" class="bg-slate-700 text-sm rounded-md text-white px-5 py-2">Back</a>
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
                    <h2 class="text-2xl font-bold mb-4">Tambah Agenda</h2>
                    <form action="{{ route('agenda.store') }}" method="POST">
                        @csrf
                        <div class="flex justify-between items-center mb-4">
                            <label for="tanggal_kegiatan" class="text-lg font-medium">Tanggal Kegiatan</label>
                            <input type="date" name="tanggal_kegiatan" id="tanggal_kegiatan"
                                class="border-gray-300 shadow-sm w-1/2 rounded-lg">
                        </div>
                        <hr>

                        <div id="kegiatan-container">
                            <div class="kegiatan-item mb-4">
                                <div class="flex justify-between items-center">
                                    <label for="waktu_kegiatan_0" class="text-lg font-medium">Waktu Kegiatan</label>
                                    <input type="time" name="kegiatan[0][waktu_kegiatan]" id="waktu_kegiatan_0"
                                        class="border-gray-300 shadow-sm w-1/2 rounded-lg">
                                </div>
                                <div class="flex justify-between items-center mt-2">
                                    <label for="judul_kegiatan_0" class="text-lg font-medium">Judul Kegiatan</label>
                                    <input type="text" name="kegiatan[0][judul_kegiatan]" id="judul_kegiatan_0"
                                        class="border-gray-300 shadow-sm w-1/2 rounded-lg">
                                </div>
                                <div class="flex justify-between items-center mt-2">
                                    <label for="deskripsi_kegiatan_0" class="text-lg font-medium">Deskripsi
                                        Kegiatan</label>
                                    <textarea name="kegiatan[0][deskripsi_kegiatan]" id="deskripsi_kegiatan_0"
                                        class="border-gray-300 shadow-sm w-1/2 rounded-lg"></textarea>
                                </div>
                            </div>
                        </div>


                        <button type="button" id="add-kegiatan"
                            class="bg-blue-500 text-white px-4 py-2 rounded-lg mb-4">Tambah Kegiatan</button>

                        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-lg">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        let kegiatanCount = 1;

        document.getElementById('add-kegiatan').addEventListener('click', function() {
            const kegiatanContainer = document.getElementById('kegiatan-container');
            const newKegiatan = `
            <hr class="my-4 border-gray-400">
                <div class="kegiatan-item mb-4">
                    <div class="flex justify-between items-center">
                        <label for="waktu_kegiatan_${kegiatanCount}" class="text-lg font-medium">Waktu Kegiatan</label>
                        <input type="time" name="kegiatan[${kegiatanCount}][waktu_kegiatan]" id="waktu_kegiatan_${kegiatanCount}"
                            class="border-gray-300 shadow-sm w-1/2 rounded-lg" required>
                    </div>
                    <div class="flex justify-between items-center mt-2">
                        <label for="judul_kegiatan_${kegiatanCount}" class="text-lg font-medium">Judul Kegiatan</label>
                        <input type="text" name="kegiatan[${kegiatanCount}][judul_kegiatan]" id="judul_kegiatan_${kegiatanCount}"
                            class="border-gray-300 shadow-sm w-1/2 rounded-lg" required>
                    </div>
                    <div class="flex justify-between items-center mt-2">
                        <label for="deskripsi_kegiatan_${kegiatanCount}" class="text-lg font-medium">Deskripsi Kegiatan</label>
                        <textarea name="kegiatan[${kegiatanCount}][deskripsi_kegiatan]" id="deskripsi_kegiatan_${kegiatanCount}"
                            class="border-gray-300 shadow-sm w-1/2 rounded-lg" required></textarea>
                    </div>
                    <button type="button" class="remove-kegiatan bg-red-500 text-white px-4 py-2 rounded-lg mt-2">Hapus Kegiatan</button>
                </div>
            `;
            kegiatanContainer.insertAdjacentHTML('beforeend', newKegiatan);

            // Menambahkan event listener untuk tombol hapus
            document.querySelectorAll('.remove-kegiatan').forEach(button => {
                button.addEventListener('click', function() {
                    this.parentElement.previousElementSibling
                .remove(); // Menghapus <hr>
                    this.parentElement.remove();
                });
            });

            kegiatanCount++;
        });
    });
</script>
