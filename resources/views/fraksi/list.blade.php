<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Fraksi') }}
            </h2>
            @can('create akd')
                <a href="{{ route('fraksi.create') }}"
                    class="bg-slate-700 text-sm rounded-md text-white px-3 py-2">Create</a>
            @endcan
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-message></x-message>
            <div class="overflow-x-auto">
                <table id="articles-table" class="w-full table-auto">
                    <thead class="bg-gray-500 text-white">
                        <tr class="border-b">
                            <th class="px-6 py-4 text-center">No</th>
                            <th class="px-6 py-4 text-center">Nama Fraksi</th>
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
                            data: 'nama',
                            name: 'nama',
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
                        $('select').addClass('border-gray-700 rounded-md p-2');
                        $('table').addClass('w-full border-collapse border border-gray-700');
                        $('th, td').addClass('px-4 py-2 border');
                        $('input[type="search"]').addClass('border-gray-700 rounded-md p-2 ml-2');

                        // Custom styling for pagination
                        $('.dataTables_paginate .paginate_button').addClass(
                            'px-3 py-1 mx-1 rounded-md border bg-gray-200 text-gray-700 hover:bg-gray-300'
                        );
                        $('.dataTables_paginate .paginate_button.current').addClass(
                            'bg-gray-500 text-white');
                    }
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
