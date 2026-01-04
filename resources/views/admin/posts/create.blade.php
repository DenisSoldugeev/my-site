@extends('layouts.admin')

@section('title', 'New Post')

@section('content')
<h1 class="page-title">// new post</h1>

<form method="POST" action="{{ route('admin.posts.store') }}">
    @csrf

    <div class="form-group">
        <label for="title">title (optional)</label>
        <input type="text" id="title" name="title" value="{{ old('title') }}">
        <p class="hint">Leave empty for micro-posts</p>
        @error('title')
            <div class="error">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="content">content</label>
        <textarea id="content" name="content" required>{{ old('content') }}</textarea>
        @error('content')
            <div class="error">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="published_at">publish date</label>
        <input type="datetime-local" id="published_at" name="published_at" value="{{ old('published_at') }}">
        <p class="hint">Leave empty to save as draft</p>
        @error('published_at')
            <div class="error">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-actions">
        <button type="submit" class="btn">create post</button>
        <a href="{{ route('admin.posts.index') }}" class="btn btn--danger">cancel</a>
    </div>
</form>
@endsection
