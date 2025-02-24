<td class="px-6 py-4 text-center">
    @can('update articles')
        <a href="{{ route('articles.edit', $article->id) }}"
            class="bg-slate-700 text-sm rounded-md text-white px-3 py-2 hover:bg-slate-600">Edit</a>
    @endcan
    @can('delete articles')
        <a href="javascript:void(0);"
            onclick="openDeleteModal({{ $article->id }}, '{{ $article->name }}')"
            class="bg-red-600 text-sm rounded-md text-white px-3 py-2 hover:bg-red-500">Delete</a>
    @endcan
</td>
