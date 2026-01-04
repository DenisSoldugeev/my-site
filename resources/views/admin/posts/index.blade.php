@extends('layouts.admin')

@section('title', 'Posts')

@section('content')
<div class="page-header">
    <h1 class="page-title">// posts</h1>
    <a href="{{ route('admin.posts.create') }}" class="btn">+ new post</a>
</div>

@if($posts->isEmpty())
    <p class="empty empty--center">No posts yet. Create your first post!</p>
@else
    <table class="posts-table">
        <thead>
            <tr>
                <th>title</th>
                <th>status</th>
                <th>date</th>
                <th>actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($posts as $post)
                <tr>
                    <td>{{ $post->title ?: Str::limit($post->content, 40) }}</td>
                    <td>
                        @if($post->published_at && $post->published_at->isPast())
                            <span class="status status--published">published</span>
                        @else
                            <span class="status status--draft">draft</span>
                        @endif
                    </td>
                    <td>{{ $post->created_at->format('Y-m-d') }}</td>
                    <td class="actions">
                        <a href="{{ route('admin.posts.edit', $post) }}" class="btn">edit</a>
                        <form action="{{ route('admin.posts.destroy', $post) }}" method="POST" onsubmit="return confirm('Delete this post?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn--danger">delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    @if($posts->hasPages())
        <div class="pagination">
            {{ $posts->links() }}
        </div>
    @endif
@endif
@endsection
