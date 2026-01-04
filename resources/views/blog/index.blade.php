@extends('layouts.app')

@section('title', 'Blog')

@section('content')
<h1 class="page-title">// posts</h1>

@if($posts->isEmpty())
    <p class="empty">No posts yet.</p>
@else
    <div class="posts">
        @foreach($posts as $post)
            <article class="post">
                <div class="post__date">{{ $post->published_at->format('Y-m-d') }}</div>
                @if($post->title)
                    <h2 class="post__title">
                        <a href="{{ route('blog.show', $post) }}">{{ $post->title }}</a>
                    </h2>
                @endif
                <p class="post__excerpt">{{ Str::limit($post->content, 200) }}</p>
            </article>
        @endforeach
    </div>

    @if($posts->hasPages())
        <div class="pagination">
            @if($posts->previousPageUrl())
                <a href="{{ $posts->previousPageUrl() }}">&larr; prev</a>
            @endif
            @if($posts->nextPageUrl())
                <a href="{{ $posts->nextPageUrl() }}">next &rarr;</a>
            @endif
        </div>
    @endif
@endif
@endsection
