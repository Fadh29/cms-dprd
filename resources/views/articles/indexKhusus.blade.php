<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Khusus
            </h2>
            <a href="{{ route('articles.list') }}" class="bg-slate-700 text-sm rounded-md text-white px-5 py-2">Back</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                @foreach ($articles as $article)
                    <div class="text-center">
                        <h1 class="text-2xl font-bold text-gray-900 dark:text-gray-100 inline-block relative">
                            {{ $article->title }}
                            <span class="block mt-2 h-1 bg-gray-500 dark:bg-gray-700 w-full"></span>
                        </h1>
                    </div>

                    <div class="mt-4 prose dark:prose-invert">
                        {!! $article->super_article !!}
                    </div>
                    @if (!$loop->last)
                        <hr class="my-8 border-4 border-gray-500 dark:border-gray-700">
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
