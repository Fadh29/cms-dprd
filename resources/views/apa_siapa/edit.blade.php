<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Apa & Siapa / Edit
            </h2>
            <a href="{{ route('apa_siapa.list') }}" class="bg-slate-700 text-sm rounded-md text-white px-5 py-2">Back</a>
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
                    <h2 class="text-2xl font-bold mb-4">Edit Tamu</h2>
                    <form action="{{ route('apa_siapa.update', $apaSiapa) }}" method="POST">
                        @csrf
                        <div class="flex justify-between items-center mb-4">
                            <label for="tanggal_kegiatan_mulai" class="text-lg font-medium">Tanggal Kegiatan</label>
                            <input type="date" name="tanggal_kegiatan_mulai" id="tanggal_kegiatan_mulai"
                                class="border-gray-300 shadow-sm w-1/2 rounded-lg"
                                value="{{ old('tanggal_kegiatan_mulai', $apaSiapa->tanggal_kegiatan_mulai) }}">
                        </div>
                        <hr>

                        <div id="tamu-container">
                            @foreach ($apaSiapa->tamu as $index => $tamu)
                                <div class="tamu-item mb-4">
                                    <h3 class="text-lg font-medium">Data Tamu</h3>
                                    <div class="flex justify-between items-center mt-2">
                                        <label for="badan_{{ $index }}" class="text-lg font-medium">Badan</label>
                                        <input type="text" name="tamu[{{ $index }}][badan]"
                                            id="badan_{{ $index }}"
                                            class="border-gray-300 shadow-sm w-1/2 rounded-lg"
                                            value="{{ old('tamu.' . $index . '.badan', $tamu->badan) }}">
                                    </div>
                                    <div class="flex justify-between items-center mt-2">
                                        <label for="agenda_{{ $index }}"
                                            class="text-lg font-medium">Agenda</label>
                                        <input type="text" name="tamu[{{ $index }}][agenda]"
                                            id="agenda_{{ $index }}"
                                            class="border-gray-300 shadow-sm w-1/2 rounded-lg"
                                            value="{{ old('tamu.' . $index . '.agenda', $tamu->agenda) }}">
                                    </div>
                                    <div class="flex justify-between items-center mt-2">
                                        <label for="akd_terkait_{{ $index }}" class="text-lg font-medium">AKD
                                            Terkait</label>
                                        <input type="text" name="tamu[{{ $index }}][akd_terkait]"
                                            id="akd_terkait_{{ $index }}"
                                            class="border-gray-300 shadow-sm w-1/2 rounded-lg"
                                            value="{{ old('tamu.' . $index . '.akd_terkait', $tamu->akd_terkait) }}">
                                    </div>
                                    <div class="flex justify-between items-center mt-2">
                                        <label for="bagian_terkait_{{ $index }}"
                                            class="text-lg font-medium">Bagian Terkait</label>
                                        <input type="text" name="tamu[{{ $index }}][bagian_terkait]"
                                            id="bagian_terkait_{{ $index }}"
                                            class="border-gray-300 shadow-sm w-1/2 rounded-lg"
                                            value="{{ old('tamu.' . $index . '.bagian_terkait', $tamu->bagian_terkait) }}">
                                    </div>
                                    <div class="flex justify-between items-center mt-2">
                                        <label for="jam_mulai_{{ $index }}" class="text-lg font-medium">Jam
                                            Mulai</label>
                                        <input type="time" name="tamu[{{ $index }}][jam_mulai]"
                                            id="jam_mulai_{{ $index }}"
                                            class="border-gray-300 shadow-sm w-1/2 rounded-lg"
                                            value="{{ old('tamu.' . $index . '.jam_mulai', $tamu->jam_mulai) }}">
                                    </div>
                                    <div class="flex justify-between items-center mt-2">
                                        <label for="jam_selesai_{{ $index }}" class="text-lg font-medium">Jam
                                            Selesai</label>
                                        <input type="time" name="tamu[{{ $index }}][jam_selesai]"
                                            id="jam_selesai_{{ $index }}"
                                            class="border-gray-300 shadow-sm w-1/2 rounded-lg"
                                            value="{{ old('tamu.' . $index . '.jam_selesai', $tamu->jam_selesai) }}">
                                    </div>
                                    <div class="flex justify-between items-center mt-2">
                                        <label for="tanggal_tamu_mulai_{{ $index }}"
                                            class="text-lg font-medium">Tanggal kedatangan tamu</label>
                                        <input type="date" name="tamu[{{ $index }}][tanggal_tamu_mulai]"
                                            id="tanggal_tamu_mulai_{{ $index }}"
                                            class="border-gray-300 shadow-sm w-1/2 rounded-lg"
                                            value="{{ old('tamu.' . $index . '.tanggal_tamu_mulai', $tamu->tanggal_tamu_mulai) }}">
                                    </div>
                                    <div class="flex justify-between items-center mt-2">
                                        <label for="tanggal_tamu_selesai_{{ $index }}"
                                            class="text-lg font-medium">Tanggal kepulangan tamu</label>
                                        <input type="date" name="tamu[{{ $index }}][tanggal_tamu_selesai]"
                                            id="tanggal_tamu_selesai_{{ $index }}"
                                            class="border-gray-300 shadow-sm w-1/2 rounded-lg"
                                            value="{{ old('tamu.' . $index . '.tanggal_tamu_selesai', $tamu->tanggal_tamu_selesai) }}">
                                    </div>
                                    <button type="button"
                                        class="remove-tamu bg-red-500 text-white px-4 py-2 rounded-lg mt-2">Hapus
                                        Tamu</button>
                                </div>
                                @if (!$loop->last)
                                    <hr class="my-4 border-gray-400">
                                @endif
                            @endforeach
                        </div>

                        <button type="button" id="add-tamu"
                            class="bg-blue-500 text-white px-4 py-2 rounded-lg mb-4">Tambah Tamu</button>

                        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-lg">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        let tamuCount = {{ $apaSiapa->tamu->count() }};

        document.getElementById('add-tamu').addEventListener('click', function() {
            const tamuContainer = document.getElementById('tamu-container');
            const newTamu = `
            <hr class="my-4 border-gray-400">
                <div class="tamu-item mb-4">
                    <h3 class="text-lg font-medium">Data Tamu</h3>
                    <div class="flex justify-between items-center mt-2">
                        <label for="badan_${tamuCount}" class="text-lg font-medium">Badan</label>
                        <input type="text" name="tamu[${tamuCount}][badan]" id="badan_${tamuCount}"
                            class="border-gray-300 shadow-sm w-1/2 rounded-lg" required>
                    </div>
                    <div class="flex justify-between items-center mt-2">
                        <label for="agenda_${tamuCount}" class="text-lg font-medium">Agenda</label>
                        <input type="text" name="tamu[${tamuCount}][agenda]" id="agenda_${tamuCount}"
                            class="border-gray-300 shadow-sm w-1/2 rounded-lg" required>
                    </div>
                    <div class="flex justify-between items-center mt-2">
                        <label for="akd_terkait_${tamuCount}" class="text-lg font-medium">AKD Terkait</label>
                        <input type="text" name="tamu[${tamuCount}][akd_terkait]" id="akd_terkait_${tamuCount}"
                            class="border-gray-300 shadow-sm w-1/2 rounded-lg" required>
                    </div>
                    <div class="flex justify-between items-center mt-2">
                        <label for="bagian_terkait_${tamuCount}" class="text-lg font-medium">Bagian Terkait</label>
                        <input type="text" name="tamu[${tamuCount}][bagian_terkait]" id="bagian_terkait_${tamuCount}"
                            class="border-gray-300 shadow-sm w-1/2 rounded-lg" required>
                    </div>
                    <div class="flex justify-between items-center mt-2">
                        <label for="jam_mulai_${tamuCount}" class="text-lg font-medium">Jam Mulai</label>
                        <input type="time" name="tamu[${tamuCount}][jam_mulai]" id="jam_mulai_${tamuCount}"
                            class="border-gray-300 shadow-sm w-1/2 rounded-lg" required>
                    </div>
                    <div class="flex justify-between items-center mt-2">
                        <label for="jam_selesai_${tamuCount}" class="text-lg font-medium">Jam Selesai</label>
                        <input type="time" name="tamu[${tamuCount}][jam_selesai]" id="jam_selesai_${tamuCount}"
                            class="border-gray-300 shadow-sm w-1/2 rounded-lg" required>
                    </div>
                    <div class="flex justify-between items-center mt-2">
                        <label for="tanggal_tamu_mulai_${tamuCount}" class="text-lg font-medium">Tanggal Kedatangan</label>
                        <input type="date" name="tamu[${tamuCount}][tanggal_tamu_mulai]" id="tanggal_tamu_mulai_${tamuCount}"
                            class="border-gray-300 shadow-sm w-1/2 rounded-lg" required>
                    </div>
                    <div class="flex justify-between items-center mt-2">
                        <label for="tanggal_tamu_selesai_${tamuCount}" class="text-lg font-medium">Tanggal Kepulangan</label>
                        <input type="date" name="tamu[${tamuCount}][tanggal_tamu_selesai]" id="tanggal_tamu_selesai_${tamuCount}"
                            class="border-gray-300 shadow-sm w-1/2 rounded-lg" required>
                    </div>
                    <button type="button" class="remove-tamu bg-red-500 text-white px-4 py-2 rounded-lg mt-2">Hapus Tamu</button>
                </div>
            `;
            tamuContainer.insertAdjacentHTML('beforeend', newTamu);

            // Menambahkan event listener untuk tombol hapus
            document.querySelectorAll('.remove-tamu').forEach(button => {
                button.addEventListener('click', function() {
                    this.parentElement.previousElementSibling
                        .remove(); // Menghapus <hr>
                    this.parentElement.remove();
                });
            });

            tamuCount++;
        });

        // Menambahkan event listener untuk tombol hapus pada tamu yang sudah ada
        document.querySelectorAll('.remove-tamu').forEach(button => {
            button.addEventListener('click', function() {
                this.parentElement.previousElementSibling
                    .remove(); // Menghapus <hr>
                this.parentElement.remove();
            });
        });
    });
</script>
