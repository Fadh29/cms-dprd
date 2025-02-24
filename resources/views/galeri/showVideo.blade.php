<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Video
            </h2>
            <a href="{{ route('video.list') }}" class="bg-slate-700 text-sm rounded-md text-white px-5 py-2">Back</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="text-center">
                    <h1 class="text-2xl font-bold text-gray-900 dark:text-gray-100 inline-block relative">
                        {{ $video->judul }}
                        <span class="block mt-2 h-1 bg-gray-500 dark:bg-gray-700 w-full"></span>
                    </h1>
                </div>

                <div class="mt-4 prose dark:prose-invert text-center">
                    @php
                        $youtubeID = extractYouTubeID($video->url);
                    @endphp

                    @if ($youtubeID)
                        <iframe class="w-full max-w-2xl mx-auto rounded-lg" height="400"
                            src="https://www.youtube.com/embed/{{ $youtubeID }}" frameborder="0" allowfullscreen>
                        </iframe>
                    @else
                        <p class="text-red-500">Video tidak tersedia atau URL salah.</p>
                    @endif

                </div>
            </div>
        </div>
    </div>

</x-app-layout>
