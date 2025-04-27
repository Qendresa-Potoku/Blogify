@extends('layouts.main')

@section('title', 'Home')

@section('content')
    <h2 class="text-2xl font-bold mb-6">All Posts</h2>

<div class="flex flex-wrap justify-center gap-6 mt-8">
    @foreach($posts as $post)
        <div class="bg-white border border-gray-200 rounded-2xl p-5 w-60 h-80 flex flex-col justify-between hover:shadow-lg hover:scale-105 transition transform duration-300 overflow-hidden">
            <div>
                <h3 class="text-lg font-bold text-gray-800 mb-2 truncate">{{ $post->title }}</h3>
                <p class="text-gray-600 text-sm overflow-hidden" style="display: -webkit-box; -webkit-line-clamp: 6; -webkit-box-orient: vertical;">
                    {{ $post->content }}
                </p>
            </div>
            <div class="flex justify-between items-center text-sm text-gray-500 mt-4">
                <span>By {{ $post->user->name }}</span>
                <span>{{ $post->created_at->format('d M Y') }}</span>
            </div>

        </div>
    @endforeach
</div>

<div class="flex justify-center mt-12 mb-8">
    {{ $posts->links('pagination.pagination') }}
</div>

@endsection
