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
            <table id="articles-table" class="w-full table-auto">
                <thead class="bg-gray-500 text-white">
                    <tr class="border-b">
                        <th class="px-6 py-4 text-left">No</th>
                        <th class="px-6 py-4 text-left">Judul</th>
                        <th class="px-6 py-4 text-left">Deskripsi</th>
                        <th class="px-6 py-4 text-center">Status</th>
                        <th class="px-6 py-4 text-left">Author</th>
                        <th class="px-6 py-4 text-center">Hari/ Tanggal Unggahan</th>
                        <th class="px-6 py-4 text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Data akan diambil melalui AJAX -->
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
                    ajax: "{{ route('articles.list') }}", // Pastikan rutenya sesuai
                    columns: [{
                            data: 'DT_RowIndex',
                            name: 'DT_RowIndex',
                            orderable: false,
                            searchable: false,
                            className: "text-right"
                        },
                        {
                            data: 'title',
                            name: 'title',
                            className: "text-center"
                        },
                        {
                            data: 'text',
                            name: 'text',
                            className: "text-left"
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
                    }
                });
            });
        </script>
    </x-slot>
</x-app-layout>
