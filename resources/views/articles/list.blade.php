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
            <table class="w-full">
                <thead class="bg-gray-500 text-white">
                    <tr class="border-b">
                        <th class="px-6 py-4 text-center">No</th>
                        <th class="px-6 py-4 text-center">Judul</th>
                        <th class="px-6 py-4 text-center">Deskripsi</th>
                        <th class="px-6 py-4 text-center">Status</th>
                        <th class="px-6 py-4 text-center">Author</th>
                        <th class="px-6 py-4 text-center">Hari/ Tanggal Unggahan</th>
                        <th class="px-6 py-4 text-center">Action</th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                    @if ($articles->isNotEmpty())
                        @foreach ($articles as $item)
                            <tr class="border-b">
                                <td class="px-6 py-4 text-left">
                                    {{ $loop->iteration }}
                                </td>
                                <td class="px-6 py-4 text-left">
                                    {{ $item->title }}
                                </td>
                                <td class="px-6 py-4 text-left">
                                    {{ Str::limit(strip_tags(html_entity_decode($item->text)), 150, '...') }}
                                </td>
                                <td class="px-6 py-4 text-left">
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium"
                                        @if ($item->status_articles == 'publish') style="background-color: #ecfdf5; color: #16a34a;"
                                          @elseif ($item->status_articles == 'draft')
                                              style="background-color: #fefcbf; color: #d97706;"
                                          @elseif ($item->status_articles == 'validasi')
                                              style="background-color: #fef2f2; color: #dc2626;" @endif>
                                        {{ $item->status_articles }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-left">
                                    {{ $item->author }}
                                </td>
                                {{-- <td class="px-6 py-4 text-left">
                                    @php
                                        $tags = json_decode($article->tags, true);
                                    @endphp
                                    @if (is_array($tags))
                                        <div class="flex flex-wrap gap-2">
                                            @foreach ($tags as $tag)
                                                @if (is_array($tag) && isset($tag['value'], $tag['color']))
                                                    <span class="px-2 py-1 text-sm rounded-lg border"
                                                        style="border: 2px solid {{ $tag['color'] }}; color: {{ $tag['color'] }};">
                                                        {{ $tag['value'] }}
                                                    </span>
                                                @else
                                                    <span
                                                        class="px-2 py-1 text-sm border rounded-lg border-gray-400 text-gray-700">
                                                        {{ is_array($tag) ? implode(', ', $tag) : $tag }}
                                                    </span>
                                                @endif
                                            @endforeach
                                        </div>
                                    @endif
                                </td> --}}
                                <td class="px-6 py-4 text-left">
                                    {{ \Carbon\carbon::parse($item->created_at)->format('d M, Y') }}
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <div class="flex justify-center gap-2">
                                        @can('update articles')
                                            <a href="{{ route('articles.edit', $item->id) }}"
                                                class="bg-slate-700 text-sm rounded-md text-white px-3 py-2 hover:bg-slate-600">
                                                Edit
                                            </a>
                                        @endcan
                                        @can('delete articles')
                                            <a href="javascript:void(0);"
                                                onclick="openDeleteModal({{ $item->id }}, '{{ $item->name }}')"
                                                class="bg-red-600 text-sm rounded-md text-white px-3 py-2 hover:bg-red-500">
                                                Delete
                                            </a>
                                        @endcan
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
            <div class="my-3">
                {{ $articles->links() }}
            </div>
            <!-- Modal Konfirmasi Hapus -->
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
            var deleteId = null;

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
