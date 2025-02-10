<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Roles') }}
            </h2>
            @can('create roles')
                <a href="{{ route('roles.create') }}" class="bg-slate-700 text-sm rounded-md text-white px-3 py-2">Create</a>
            @endcan
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-message></x-message>
            <table class="w-full">
                <thead class="bg-gray-500 text-white">
                    <tr class="border-b">
                        <th class="px-6 py-4 text-left">No</th>
                        <th class="px-6 py-4 text-left">Name</th>
                        <th class="px-6 py-4 text-left">Permissions</th>
                        <th class="px-6 py-4 text-left">Created</th>
                        <th class="px-6 py-4 text-center">Action</th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                    @if ($roles->isNotEmpty())
                        @foreach ($roles as $roles)
                            <tr class="border-b">
                                <td class="px-6 py-4 text-left">
                                    {{ $loop->iteration }}
                                </td>
                                <td class="px-6 py-4 text-left">
                                    {{ $roles->name }}
                                </td>
                                <td class="px-6 py-4 text-left">
                                    {{ $roles->permissions->pluck('name')->implode(', ') }}
                                </td>
                                <td class="px-6 py-4 text-left">
                                    {{ \Carbon\carbon::parse($roles->created_at)->format('d M, Y') }}
                                </td>
                                <td class="px-6 py-4 text-center">
                                    @can('update roles')
                                        <a href="{{ route('roles.edit', $roles->id) }}"
                                            class="bg-slate-700 text-sm rounded-md text-white px-3 py-2 hover:bg-slate-600">Edit</a>
                                    @endcan
                                    @can('delete roles')
                                        <a href="javascript:void(0);" onclick="openDeleteModal({{ $roles->id }})"
                                            class="bg-red-600 text-sm rounded-md text-white px-3 py-2 hover:bg-red-500">Delete</a>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
            <div class="my-3">
                {{-- {{ $roles->links() }} --}}
            </div>
            <!-- Modal Konfirmasi Hapus -->
            <div id="deleteModal"
                class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50 hidden">
                <div class="bg-white rounded-lg shadow-lg p-6 w-96">
                    <h2 class="text-lg font-semibold text-gray-800">Konfirmasi Penghapusan</h2>
                    <p class="text-gray-600 mt-2">Apakah Anda yakin ingin menghapus <b>{{ $roles->name }}</b> ?</p>
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
                    fetch('{{ route('roles.destroy', ':id') }}'.replace(':id', deleteId), {
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
                                window.location.href = '{{ route('roles.list') }}'; // Redirect langsung
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
