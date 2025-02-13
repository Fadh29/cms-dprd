<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Agenda / Edit
            </h2>
            <a href="{{ route('agenda.list') }}" class="bg-slate-700 text-sm rounded-md text-white px-5 py-2">Back</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('agenda.update', $agenda) }}" method="POST">
                        @csrf
                        <!-- Tanggal Kegiatan -->
                        <div class="mb-4">
                            <label for="tanggal_kegiatan" class="text-lg font-medium">Tanggal Kegiatan</label>
                            <input type="date" name="tanggal_kegiatan" id="tanggal_kegiatan"
                                class="border-gray-300 shadow-sm w-full rounded-lg"
                                value="{{ old('tanggal_kegiatan', $agenda->tanggal_kegiatan) }}" required>
                            @error('tanggal_kegiatan')
                                <p class="text-red-500 text-sm">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Container Kegiatan -->
                        <div id="kegiatan-container">
                            @foreach ($agenda->kegiatan as $index => $kegiatan)
                                <div class="kegiatan-item mb-4 border-b border-gray-300 pb-4">
                                    <!-- Waktu Kegiatan -->
                                    <div class="mb-2">
                                        <label class="text-lg font-medium">Waktu Kegiatan</label>
                                        <input type="time" name="kegiatan[{{ $index }}][waktu_kegiatan]"
                                            class="border-gray-300 shadow-sm w-full rounded-lg"
                                            value="{{ old("kegiatan.$index.waktu_kegiatan", $kegiatan->waktu_kegiatan) }}"
                                            required>
                                        @error("kegiatan.$index.waktu_kegiatan")
                                            <p class="text-red-500 text-sm">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Judul Kegiatan -->
                                    <div class="mb-2">
                                        <label class="text-lg font-medium">Judul Kegiatan</label>
                                        <input type="text" name="kegiatan[{{ $index }}][judul_kegiatan]"
                                            class="border-gray-300 shadow-sm w-full rounded-lg"
                                            value="{{ old("kegiatan.$index.judul_kegiatan", $kegiatan->judul_kegiatan) }}"
                                            required>
                                        @error("kegiatan.$index.judul_kegiatan")
                                            <p class="text-red-500 text-sm">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Deskripsi Kegiatan -->
                                    <div class="mb-2">
                                        <label class="text-lg font-medium">Deskripsi Kegiatan</label>
                                        <textarea name="kegiatan[{{ $index }}][deskripsi_kegiatan]" class="border-gray-300 shadow-sm w-full rounded-lg"
                                            required>{{ old("kegiatan.$index.deskripsi_kegiatan", $kegiatan->deskripsi_kegiatan) }}</textarea>
                                        @error("kegiatan.$index.deskripsi_kegiatan")
                                            <p class="text-red-500 text-sm">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <button type="button"
                                        class="remove-kegiatan bg-red-500 text-white px-4 py-2 rounded-lg mt-2">Hapus</button>
                                </div>
                            @endforeach
                        </div>

                        <button type="button" id="add-kegiatan"
                            class="bg-blue-500 text-white px-4 py-2 rounded-lg mb-4">Tambah Kegiatan</button>

                        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-lg">Simpan
                            Perubahan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        let kegiatanCount = {{ $agenda->kegiatan->count() }};

        document.getElementById('add-kegiatan').addEventListener('click', function() {
            const kegiatanContainer = document.getElementById('kegiatan-container');
            const newKegiatan = `
                <div class="kegiatan-item mb-4 border-b border-gray-300 pb-4">
                    <div class="mb-2">
                        <label class="text-lg font-medium">Waktu Kegiatan</label>
                        <input type="time" name="kegiatan[\${kegiatanCount}][waktu_kegiatan]" class="border-gray-300 shadow-sm w-full rounded-lg" required>
                    </div>
                    <div class="mb-2">
                        <label class="text-lg font-medium">Judul Kegiatan</label>
                        <input type="text" name="kegiatan[\${kegiatanCount}][judul_kegiatan]" class="border-gray-300 shadow-sm w-full rounded-lg" required>
                    </div>
                    <div class="mb-2">
                        <label class="text-lg font-medium">Deskripsi Kegiatan</label>
                        <textarea name="kegiatan[\${kegiatanCount}][deskripsi_kegiatan]" class="border-gray-300 shadow-sm w-full rounded-lg" required></textarea>
                    </div>
                    <button type="button" class="remove-kegiatan bg-red-500 text-white px-4 py-2 rounded-lg mt-2">Hapus</button>
                </div>
            `;
            kegiatanContainer.insertAdjacentHTML('beforeend', newKegiatan);

            document.querySelectorAll('.remove-kegiatan').forEach(button => {
                button.addEventListener('click', function() {
                    this.parentElement.remove();
                });
            });

            kegiatanCount++;
        });

        document.querySelectorAll('.remove-kegiatan').forEach(button => {
            button.addEventListener('click', function() {
                this.parentElement.remove();
            });
        });
    });
</script>
