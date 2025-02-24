<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Video') }}
            </h2>
            @can('create galeri')
                <a href="{{ route('video.create') }}" class="bg-slate-700 text-sm rounded-md text-white px-3 py-2">Create</a>
            @endcan
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-message></x-message>
            <!-- Pesan error -->
            <div id="checkboxError"
                class="hidden bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative my-3"
                role="alert">
                <strong class="font-bold">Terjadi kesalahan!</strong>
                <p class="mt-2">Video ditampilkan melebihi batas maksimum.</p>
            </div>

            <section class="video-section px-16 mb-8">
                @if ($video->isEmpty())
                    <p class="text-center text-gray-600">Video belum ada</p>
                @else
                    <div class="wrapper">
                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                            @foreach ($video as $item)
                                @php
                                    $videoUrl = $item->url;
                                    $status = [
                                        'publish' => ['bg' => '#ecfdf5', 'text' => '#16a34a'],
                                        'draft' => ['bg' => '#fefcbf', 'text' => '#d97706'],
                                        'validasi' => ['bg' => '#fef2f2', 'text' => '#dc2626'],
                                        'spesial' => ['bg' => '#fef9c3', 'text' => '#b7791f'],
                                    ];
                                    $currentStatus = $status[$item->status_foto] ?? [
                                        'bg' => '#ffffff',
                                        'text' => '#000000',
                                    ];

                                    // Ambil ID video jika dari YouTube
                                    $videoEmbed =
                                        '<img src="https://via.placeholder.com/150" alt="Placeholder" class="w-full h-40 object-cover rounded-md">';
                                    if ($videoUrl) {
                                        preg_match(
                                            '/(?:youtu\.be\/|youtube\.com\/(?:.*v=|.*\/))([^&?]+)/',
                                            $videoUrl,
                                            $match,
                                        );
                                        $videoId = $match[1] ?? null;
                                        if ($videoId) {
                                            $videoEmbed =
                                                '<iframe class="w-full h-40 rounded-lg" src="https://www.youtube.com/embed/' .
                                                $videoId .
                                                '" frameborder="0" allowfullscreen></iframe>';
                                        }
                                    }
                                @endphp

                                <div
                                    class="relative p-4 border rounded-md shadow-md flex flex-col justify-between h-full">
                                    <!-- Gambar / Video & Info -->
                                    <a title="Klik untuk selengkapnya" href="{{ route('galeri.showVideo', $item->slug) }}"
                                        class="flex flex-col">
                                        {!! $videoEmbed !!} <!-- Video atau Placeholder -->

                                        <span
                                            class="block text-sm text-black font-semibold hover:underline hover:text-black font-sans line-clamp-2 mt-2">
                                            {{ $item->judul }}
                                        </span>
                                        <span class="tanggal block text-left text-gray-600">
                                            {{ \Carbon\Carbon::parse($item->tanggal_publish_mulai)->translatedFormat('l, d F Y') }}
                                        </span>
                                    </a>

                                    <!-- Status & Checkbox -->
                                    <div class="flex items-center justify-between mt-2">
                                        <span class="inline-block px-2 py-1 text-xs font-semibold rounded-md"
                                            style="background-color: {{ $currentStatus['bg'] }}; color: {{ $currentStatus['text'] }};">
                                            {{ ucfirst($item->status_foto) }}
                                        </span>

                                        @if ($item->status_foto !== 'validasi')
                                            <label class="flex items-center space-x-2">
                                                <input type="checkbox"
                                                    class="toggle-status w-5 h-5 text-blue-600 border-gray-300 rounded focus:ring-blue-500"
                                                    data-id="{{ $item->id }}"
                                                    {{ $item->status_tampil ? 'checked' : '' }}>
                                                <span class="text-sm text-gray-700">Tampilkan</span>
                                            </label>
                                        @endif
                                    </div>

                                    <!-- Tombol Edit & Delete -->
                                    <div class="mt-3 flex space-x-2">
                                        <a href="{{ route('video.edit', $item->id) }}"
                                            class="bg-slate-700 text-sm rounded-md text-white px-3 py-2 hover:bg-slate-600">Edit</a>
                                        <a href="javascript:void(0);"
                                            onclick="openDeleteModal({{ $item->id }}, '{{ $item->judul }}')"
                                            class="bg-red-600 text-sm rounded-md text-white px-3 py-2 hover:bg-red-500">Delete</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </section>
            <div id="deleteModal"
                class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50 hidden">
                <div class="bg-white rounded-lg shadow-lg p-6 w-96">
                    <h2 class="text-lg font-semibold text-gray-800">Konfirmasi Penghapusan</h2>
                    <p class="text-gray-600 mt-2">Apakah Anda yakin ingin menghapus?</p>
                    <div class="flex justify-end mt-4">
                        <button class="px-4 py-2 bg-gray-400 text-white rounded-md hover:bg-gray-500 mr-2"
                            onclick="closeDeleteModal()">Batal</button>
                        <button id="confirmDelete"
                            class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700">Hapus</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-slot name="script">
        <script type="text/javascript">
            function openDeleteModal(id) {
                deleteId = id; // Simpan ID yang akan dihapus
                document.getElementById("deleteModal").classList.remove("hidden");
            }

            function closeDeleteModal() {
                document.getElementById("deleteModal").classList.add("hidden");
            }

            document.getElementById("confirmDelete").addEventListener("click", function() {
                if (deleteId) {
                    fetch('{{ route('foto.destroy', ':id') }}'.replace(':id', deleteId), {
                            method: "DELETE",
                            headers: {
                                "Content-Type": "application/json",
                                "X-CSRF-TOKEN": '{{ csrf_token() }}'
                            }
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.status) {
                                closeDeleteModal();
                                window.location.href = '{{ route('foto.list') }}'; // Redirect langsung
                            }
                        })
                        .catch(error => {
                            console.error("Error:", error);
                            alert("Terjadi kesalahan, silakan coba lagi.");
                        });
                }
            });

            document.addEventListener("DOMContentLoaded", function() {
                document.querySelectorAll(".toggle-status").forEach(checkbox => {
                    checkbox.addEventListener("change", async function() {
                        let fotoId = this.getAttribute("data-id");
                        let statusTampil = this.checked ? 1 : 0;

                        try {
                            let response = await fetch("{{ route('foto.updateStatus') }}", {
                                method: "POST",
                                headers: {
                                    "Content-Type": "application/json",
                                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                                },
                                body: JSON.stringify({
                                    id: fotoId,
                                    status_tampil: statusTampil
                                })
                            });

                            let data = await response.json();
                            if (data.success) {
                                console.log(
                                    `Status berhasil diperbarui untuk ID ${fotoId}: ${data.status_tampil}`
                                );
                            } else {
                                console.error("Gagal memperbarui status:", data.error);
                            }
                        } catch (error) {
                            console.error("Terjadi kesalahan:", error);
                        }
                    });
                });
            });

            document.addEventListener('DOMContentLoaded', function() {
                const checkboxes = document.querySelectorAll('.toggle-status');
                const errorBox = document.getElementById('checkboxError');

                checkboxes.forEach(checkbox => {
                    checkbox.addEventListener('change', function() {
                        let checkedCount = document.querySelectorAll('.toggle-status:checked').length;

                        // Jika lebih dari 2 checkbox dicentang, batalkan perubahan dan tampilkan error
                        if (checkedCount > 2) {
                            this.checked = false; // Batalkan perubahan di frontend
                            errorBox.classList.remove('hidden'); // Tampilkan pesan error
                            return;
                        } else {
                            errorBox.classList.add(
                                'hidden'); // Sembunyikan pesan error jika masih dalam batas
                        }

                        // Kirim perubahan ke backend via AJAX
                        fetch('{{ route('foto.updateStatus') }}', {
                                method: 'POST',
                                headers: {
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                    'Content-Type': 'application/json'
                                },
                                body: JSON.stringify({
                                    id: this.dataset.id,
                                    status_tampil: this.checked ? 1 : 0
                                })
                            })
                            .then(response => response.json())
                            .then(data => {
                                if (!data.success) {
                                    this.checked = false; // Batalkan perubahan jika gagal
                                    errorBox.classList.remove('hidden'); // Tampilkan pesan error
                                }
                            })
                            .catch(error => {
                                console.error('Error:', error);
                            });
                    });
                });
            });

            function openDeleteModal(id) {
                deleteId = id; // Simpan ID yang akan dihapus
                document.getElementById("deleteModal").classList.remove("hidden");
            }

            function closeDeleteModal() {
                document.getElementById("deleteModal").classList.add("hidden");
            }

            document.getElementById("confirmDelete").addEventListener("click", function() {
                if (deleteId) {
                    fetch('{{ route('foto.destroy', ':id') }}'.replace(':id', deleteId), {
                            method: "DELETE",
                            headers: {
                                "Content-Type": "application/json",
                                "X-CSRF-TOKEN": '{{ csrf_token() }}'
                            }
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.status) {
                                closeDeleteModal();
                                window.location.href = '{{ route('foto.list') }}'; // Redirect langsung
                            }
                        })
                        .catch(error => {
                            console.error("Error:", error);
                            alert("Terjadi kesalahan, silakan coba lagi.");
                        });
                }
            });
        </script>
    </x-slot>
</x-app-layout>
