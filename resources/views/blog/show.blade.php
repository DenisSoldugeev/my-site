@extends('layouts.app')

@section('title', $post->title ?? 'Post')

@section('content')
<article>
    <header class="post-header">
        <div class="post-header__date">{{ $post->published_at->format('Y-m-d H:i') }}</div>
        @if($post->title)
            <h1 class="post-header__title">{{ $post->title }}</h1>
        @endif
    </header>

    <div class="post-content">{{ $post->content }}</div>
</article>

<div class="back-link">
    <a href="{{ route('blog.index') }}">&larr; back to posts</a>
</div>
@endsection
