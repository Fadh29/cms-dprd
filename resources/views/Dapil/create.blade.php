<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Daerah Pilih / Create
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

                    <h2 class="text-2xl font-bold mb-4">Tambah Daerah Pilih</h2>
                    <form action="{{ route('dapil.store') }}" method="POST">
                        @csrf

                        <div class="flex justify-between items-center mt-2">
                            <label for="nama" class="text-lg font-medium">Nama Daerah Pilihan</label>
                            <input type="text" name="nama" id="nama"
                                class="border-gray-300 shadow-sm w-1/2 rounded-lg @error('nama') border-red-500 @enderror"
                                value="{{ old('nama') }}">
                        </div>
                        @error('nama')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                        <hr class="mb-4 border-slate-900">

                        <div id="dapil-container">
                            <div class="flex space-x-4 mt-2">
                                <div class="w-1/2">
                                    <label for="kecamatan" class="block text-sm font-medium">Pilih Kecamatan</label>
                                    <select name="kecamatan_id[]" id="kecamatan"
                                        class="border-gray-300 w-full rounded-lg">
                                        <option value="">-- Pilih Kecamatan --</option>
                                        @foreach ($kecamatan as $kec)
                                            <option value="{{ $kec->id }}"
                                                {{ in_array($kec->id, old('kecamatan_id', [])) ? 'selected' : '' }}>
                                                {{ $kec->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="w-1/2">
                                    <label for="desa" class="block text-sm font-medium">Pilih Desa</label>
                                    <select name="desa_id[]" id="desa" class="border-gray-300 w-full rounded-lg" required>
                                        <option value="">-- Pilih Desa --</option>
                                    </select>
                                </div>
                            </div>
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
                    class="border-gray-300 shadow-sm w-full rounded-lg kecamatan-dropdown" required>
                    ${kecamatanOptions}
                </select>
            </div>

            <div class="w-1/2">
                <label for="desa_${dapilCount}" class="block text-sm font-medium">Pilih Desa</label>
                <select name="desa_id[]" id="desa_${dapilCount}"
                    class="border-gray-300 shadow-sm w-full rounded-lg desa-dropdown" required>
                    <option value="">-- Pilih Desa --</option>
                </select>
            </div>
        </div>
       <div class="mt-2">
                    <button type="button" class="remove-dapil bg-red-500 text-white px-4 py-2 rounded-lg">
                        Hapus Kecamatan Desa
                    </button>
                </div>
        `;

            dapilContainer.insertAdjacentHTML('beforeend', newDapil);

            // Event listener untuk menghapus dapil
            const newRemoveButton = dapilContainer.lastElementChild.querySelector('.remove-dapil');
            newRemoveButton.addEventListener('click', function() {
                this.parentElement.previousElementSibling?.remove(); // Hapus <hr> jika ada
                this.parentElement.remove();
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
