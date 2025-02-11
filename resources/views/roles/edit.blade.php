<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Roles / Edit
            </h2>
            <a href="{{ route('roles.list') }}" class="bg-slate-700 text-sm rounded-md text-white px-5 py-2">Back</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('roles.update', $role->id) }}" method="post">
                        @csrf

                        <div>
                            <label for="" class="text-lg font-medium">Nama</label>
                            <div class="my-3">
                                <input value="{{ old('name', $role->name) }}" name="name" placeholder="Masukkan Nama"
                                    type="text" class="border-gray-300 shadow-sm w-1/2 rounded-lg">
                                @error('name')
                                    <p class="text-red-400 font-medium">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="grid grid-cols-4 mb-3">
                                <div class="mt-3">
                                    @if ($groupedPermissions->isNotEmpty())
                                        @foreach ($groupedPermissions as $group => $perms)
                                            <h3 class="font-bold inline-block">{{ $group }}</h3>
                                            <input type="checkbox" class="ml-2 check-all-group"
                                                data-group="{{ Str::slug($group) }}">
                                            <label for="" class="ml-1 text-sm">Check All</label>
                                            <ul class="mt-2">
                                                @foreach ($perms as $perm)
                                                    <li>
                                                        <input type="checkbox" name="permission[]"
                                                            class="rounded group-{{ Str::slug($group) }}"
                                                            value="{{ old('name', $perm->name) }}"
                                                            id="permission-{{ $perm->id }}"
                                                            {{ $hasPermissions->contains($perm->name) ? 'checked' : '' }}>
                                                        {{ $perm->name }}
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @endforeach
                                    @endif
                                </div>
                            </div>

                            <script>
                                document.addEventListener("DOMContentLoaded", function() {
                                    document.querySelectorAll('.check-all-group').forEach(function(checkAll) {
                                        checkAll.addEventListener('change', function() {
                                            let groupClass = '.group-' + this.dataset.group;
                                            document.querySelectorAll(groupClass).forEach(function(checkbox) {
                                                checkbox.checked = checkAll.checked;
                                            });
                                        });
                                    });
                                });
                            </script>

                            <button class="bg-slate-700 text-sm rounded-md text-white px-5 py-3">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
