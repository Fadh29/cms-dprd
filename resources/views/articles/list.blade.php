<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Warta') }}
            </h2>
            @can('create articles')
                <a href="{{ route('articles.create') }}"
                    class="bg-slate-700 text-sm rounded-md text-white px-3 py-2">Create</a>
            @endcan
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-message></x-message>
            <div id="errorModal"
                class="fixed inset-0 z-50 flex items-center justify-center hidden bg-black bg-opacity-50">
                <div class="bg-white p-6 rounded-lg shadow-lg max-w-md w-full">
                    <h2 class="text-lg font-bold text-red-600">Terjadi Kesalahan</h2>
                    <p id="errorMessage" class="mt-2 text-gray-700"></p>
                    <div class="mt-4 text-right">
                        <button id="closeErrorModal" class="px-4 py-2 bg-red-600 text-white rounded">Tutup</button>
                    </div>
                </div>
            </div>
            <div class="overflow-x-auto">
                <table id="articles-table" class="w-full table-auto">
                    <thead class="bg-gray-500 text-white">
                        <tr class="border-b">
                            <th class="px-6 py-4 text-center">No</th>
                            <th class="px-6 py-4 text-center">Judul</th>
                            <th class="px-6 py-4 text-center">Deskripsi</th>
                            <th class="px-6 py-4 text-center">Status</th>
                            <th class="px-6 py-4 text-center">Status Konten</th>
                            <th class="px-6 py-4 text-center">Hari/ Tanggal Unggahan</th>
                            <th class="px-6 py-4 text-center">Tampilkan</th>
                            <th class="px-4 py-2 border-b w-32 min-w-[200px]">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Data akan diambil melalui AJAX -->
                    </tbody>
                </table>

            </div>
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
            $(document).ready(function() {
                $('#articles-table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "{{ route('articles.list') }}", // Pastikan rutenya sesuai
                    columns: [{
                            data: 'DT_RowIndex',
                            name: 'DT_RowIndex',
                            orderable: false,
                            searchable: false,
                            className: "text-center"
                        },
                        {
                            data: 'title',
                            name: 'title',
                            className: "text-center"
                        },
                        {
                            data: 'text',
                            name: 'text',
                            className: "text-center"
                        },
                        {
                            data: 'status_articles',
                            name: 'status_articles',
                            className: "text-center"
                        },
                        {
                            data: 'spesial_kategori',
                            name: 'spesial_kategori',
                            className: "text-center"
                        },
                        {
                            data: 'created_at',
                            name: 'created_at',
                            className: "text-center"
                        },
                        {
                            data: 'tampilkan',
                            name: 'tampilkan',
                            orderable: false,
                            searchable: false,
                            className: "text-center"
                        },
                        {
                            data: 'action',
                            name: 'action',
                            orderable: false,
                            searchable: false,
                            className: "text-center"
                        },
                    ],
                    order: [
                        [4, 'desc'],
                        [5, 'desc']
                    ],
                    columnDefs: [{
                        width: "200px",
                        targets: 6
                    }],
                    language: {
                        search: "Cari:",
                        lengthMenu: "Tampilkan _MENU_ data",
                        info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
                        paginate: {
                            first: "Awal",
                            last: "Akhir",
                            next: "Selanjutnya",
                            previous: "Sebelumnya"
                        },
                    },
                    dom: '<"flex flex-row justify-between items-center gap-4 mb-4"lf>rt<"flex flex-row justify-between items-center mt-4 gap-4"ip>',
                    drawCallback: function() {
                        $('select').addClass('border-gray-950 rounded-md p-2');
                        $('table').addClass('w-full border-collapse border border-gray-950');
                        $('th, td').addClass('px-4 py-2 border');
                        $('input[type="search"]').addClass('border-gray-950 rounded-md p-2 ml-2');

                        // Custom styling for pagination
                        $('.dataTables_paginate .paginate_button').addClass(
                            'px-3 py-1 mx-1 rounded-md border bg-gray-200 text-gray-700 hover:bg-gray-300'
                        );
                        $('.dataTables_paginate .paginate_button.current').addClass(
                            'bg-gray-500 text-white');
                    }
                });
            });

            $(document).on('change', '.toggle-status', function() {
                let checkbox = $(this); // Simpan referensi checkbox
                let id = checkbox.data('id');
                let status = checkbox.prop('checked') ? 1 : 0;

                $.ajax({
                    url: "/articles/" + id + "/update-status",
                    type: "POST",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        status: status
                    },
                    success: function(response) {
                        console.log("Success:", response);
                        if (response.success) {
                            $('#articles-table').DataTable().ajax.reload(null,
                            false); // Reload tabel tanpa refresh halaman
                        }
                    },
                    error: function(xhr) {
                        let response = JSON.parse(xhr.responseText);
                        console.error("Error Response:", response.message);

                        if (xhr.status === 400) { // Batas maksimal 7 artikel
                            $("#errorMessage").text(response.message); // Set pesan error di modal
                            $("#errorModal").removeClass("hidden"); // Tampilkan modal

                            checkbox.prop('checked', !status); // Kembalikan checkbox ke posisi sebelumnya
                        } else {
                            alert("Terjadi kesalahan, coba lagi.");
                        }
                    }
                });
            });

            // Tutup modal saat tombol ditutup ditekan
            $("#closeErrorModal").click(function() {
                $("#errorModal").addClass("hidden");
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
                    fetch('{{ route('articles.destroy', ':id') }}'.replace(':id', deleteId), {
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
                                window.location.href = '{{ route('articles.list') }}'; // Redirect langsung
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
