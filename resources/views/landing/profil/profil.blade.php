@extends('layouts.app-dprd')
@section('content')
    <div class="py-12 pt-48">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-center">
            {{ $article->title }}
        </h2>
        <div class="w-fit mx-auto border-b-4 border-gray-800 mt-2"></div> <!-- Garis di bawah title -->

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="prose dark:prose-invert text-center">
                    <div class="text-left">
                        {!! $article->super_article !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
