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
            <table id="articles-table" class="min-w-full bg-white border border-gray-200">
                <thead class="bg-gray-500 text-white">
                    <tr>
                        <th class="px-6 py-4 text-center">No</th>
                        <th class="px-6 py-4 text-center">Judul</th>
                        <th class="px-6 py-4 text-center">Deskripsi</th>
                        <th class="px-6 py-4 text-center">Status</th>
                        <th class="px-6 py-4 text-center">Author</th>
                        <th class="px-6 py-4 text-center">Hari/ Tanggal Unggahan</th>
                        <th class="px-6 py-4 text-center">Action</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    <!-- Data akan diisi oleh DataTables -->
                </tbody>
            </table>
        </div>
    </div>

    <x-slot name="script">
        <script type="text/javascript">
            $(document).ready(function() {
                $('#articles-table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "{{ route('articles.list') }}",
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
                            className: "text-left"
                        },
                        {
                            data: 'text',
                            name: 'text',
                            className: "text-left truncate max-w-sm"
                        },
                        {
                            data: 'status_articles',
                            name: 'status_articles',
                            className: "text-center"
                        },
                        {
                            data: 'author',
                            name: 'author',
                            className: "text-left"
                        },
                        {
                            data: 'created_at',
                            name: 'created_at',
                            className: "text-left"
                        },
                        {
                            data: 'action',
                            name: 'action',
                            orderable: false,
                            searchable: false,
                            className: "text-center"
                        },
                    ],
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
                        processing: "Memproses..."
                    },
                    pageLength: 10,
                    order: [
                        [5, 'desc']
                    ]
                });
            });

            function openDeleteModal(id) {
                if (confirm('Apakah Anda yakin ingin menghapus artikel ini?')) {
                    fetch('{{ route('articles.destroy', ':id') }}'.replace(':id', id), {
                            method: "DELETE",
                            headers: {
                                "Content-Type": "application/json",
                                "X-CSRF-TOKEN": '{{ csrf_token() }}'
                            }
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.status) {
                                $('#articles-table').DataTable().ajax.reload();
                            } else {
                                alert("Gagal menghapus artikel.");
                            }
                        })
                        .catch(error => console.error("Error:", error));
                }
            }
        </script>
    </x-slot>
</x-app-layout>
