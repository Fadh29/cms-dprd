<x-app-layout>

    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Edit Daerah Pilih
            </h2>
            <a href="{{ route('dapil.list') }}" class="bg-slate-700 text-sm rounded-md text-white px-5 py-2">Back</a>
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

                    <h2 class="text-2xl font-bold mb-4">Edit Daerah Pilih</h2>
                    <form action="{{ route('dapil.update', $dapil) }}" method="POST">
                        @csrf
                        <div class="flex justify-between items-center mt-2">
                            <label for="nama" class="text-lg font-medium">Nama Daerah Pilihan</label>
                            <input type="text" name="nama" id="nama"
                                class="border-gray-300 shadow-sm w-1/2 rounded-lg @error('nama') border-red-500 @enderror"
                                value="{{ old('nama', $dapil->nama) }}">
                        </div>
                        @error('nama')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                        <hr class="mb-4 border-slate-900">

                        <div id="dapil-container">
                            @foreach ($dapil->kecamatan as $index => $kec)
                                <div class="flex space-x-4 mt-2">
                                    <div class="w-1/2">
                                        <label for="kecamatan_{{ $index }}"
                                            class="block text-sm font-medium">Pilih Kecamatan</label>
                                        <select name="kecamatan_id[]" id="kecamatan_{{ $index }}"
                                            class="border-gray-300 w-full rounded-lg kecamatan-dropdown">
                                            <option value="">-- Pilih Kecamatan --</option>
                                            @foreach ($kecamatan as $item)
                                                <option value="{{ $item->id }}"
                                                    {{ $item->id == $kec->id ? 'selected' : '' }}>
                                                    {{ $item->nama }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="w-1/2">
                                        <label for="desa_{{ $index }}" class="block text-sm font-medium">Pilih
                                            Desa</label>
                                        <select name="desa_id[]" id="desa_{{ $index }}"
                                            class="border-gray-300 w-full rounded-lg desa-dropdown">
                                            <option value="">-- Pilih Desa --</option>
                                            @foreach ($kecamatan as $item)
                                                @if ($item->id == $kec->id)
                                                    @foreach ($item->desa as $desa)
                                                        <option value="{{ $desa->id }}"
                                                            {{ in_array($desa->id, $selectedDesa ?? []) ? 'selected' : '' }}>
                                                            {{ $desa->nama }}
                                                        </option>
                                                    @endforeach
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <button type="button"
                                        class="remove-dapil bg-red-500 text-white px-4 py-2 rounded-lg mt-2">
                                        Hapus Dapil
                                    </button>
                                </div>
                            @endforeach
                        </div>

                        <button type="button" id="add-dapil" class="bg-blue-500 text-white px-4 py-2 rounded-lg mt-4">
                            Tambah Daerah
                        </button>
                        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-lg mt-4">
                            Simpan
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        let dapilCount = 0;
        const kecamatanSelect = document.getElementById("kecamatan");
        const desaSelect = document.getElementById("desa");
        const dapilContainer = document.getElementById('dapil-container');

        // Simpan opsi kecamatan yang sudah ada untuk dipakai kembali
        let kecamatanOptions = kecamatanSelect.innerHTML;

        document.getElementById('add-dapil').addEventListener('click', function() {
            dapilCount++;

            const newDapil = `
            <hr class="my-4 border-gray-400">
            <div class="flex space-x-4 mt-2">
                <div class="w-1/2">
                    <label for="kecamatan_${dapilCount}" class="block text-sm font-medium">Pilih Kecamatan</label>
                    <select name="kecamatan_id[]" id="kecamatan_${dapilCount}"
                        class="border-gray-300 shadow-sm w-full rounded-lg kecamatan-dropdown">
                        ${kecamatanOptions}
                    </select>
                </div>

                <div class="w-1/2">
                    <label for="desa_${dapilCount}" class="block text-sm font-medium">Pilih Desa</label>
                    <select name="desa_id[]" id="desa_${dapilCount}"
                        class="border-gray-300 shadow-sm w-full rounded-lg desa-dropdown">
                        <option value="">-- Pilih Desa --</option>
                    </select>
                </div>

                <button type="button" class="remove-dapil bg-red-500 text-white px-4 py-2 rounded-lg mt-2">
                    Hapus Dapil
                </button>
            </div>
        `;

            dapilContainer.insertAdjacentHTML('beforeend', newDapil);

            // Event listener untuk menghapus dapil
            document.querySelectorAll('.remove-dapil').forEach(button => {
                button.addEventListener('click', function() {
                    this.parentElement.previousElementSibling
                        ?.remove(); // Hapus <hr> jika ada
                    this.parentElement.remove();
                });
            });

            // Event listener untuk update desa berdasarkan kecamatan
            document.getElementById(`kecamatan_${dapilCount}`).addEventListener('change', function() {
                updateDesaOptions(this, `desa_${dapilCount}`);
            });
        });

        kecamatanSelect.addEventListener("change", function() {
            updateDesaOptions(this, "desa");
        });

        function updateDesaOptions(kecamatanDropdown, desaDropdownId) {
            const kecamatanId = kecamatanDropdown.value;
            const desaDropdown = document.getElementById(desaDropdownId);
            desaDropdown.innerHTML = '<option value="">-- Pilih Desa --</option>'; // Reset desa options

            if (kecamatanId) {
                fetch(`/api/desa?kecamatan_id=${kecamatanId}`)
                    .then(response => response.json())
                    .then(data => {
                        data.forEach(desa => {
                            const option = document.createElement("option");
                            option.value = desa.id;
                            option.textContent = desa.nama;
                            desaDropdown.appendChild(option);
                        });
                    });
            }
        }
    });
</script>
