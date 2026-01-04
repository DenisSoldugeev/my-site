@extends('layouts.admin')

@section('title', 'Edit Post')

@section('content')
<h1 class="page-title">// edit post</h1>

<form method="POST" action="{{ route('admin.posts.update', $post) }}">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="title">title (optional)</label>
        <input type="text" id="title" name="title" value="{{ old('title', $post->title) }}">
        @error('title')
            <div class="error">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="content">content</label>
        <textarea id="content" name="content" required>{{ old('content', $post->content) }}</textarea>
        @error('content')
            <div class="error">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="published_at">publish date</label>
        <input type="datetime-local" id="published_at" name="published_at"
               value="{{ old('published_at', $post->published_at?->format('Y-m-d\TH:i')) }}">
        <p class="hint">Clear to unpublish</p>
        @error('published_at')
            <div class="error">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-actions">
        <button type="submit" class="btn">save changes</button>
        <a href="{{ route('admin.posts.index') }}" class="btn btn--danger">cancel</a>
    </div>
</form>
@endsection
