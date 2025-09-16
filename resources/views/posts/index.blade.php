@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">All Blog Posts</h2>

    @auth
        <a href="{{ route('posts.create') }}" class="btn btn-primary mb-3">+ New Post</a>
    @endauth

    @foreach($posts as $post)
        <div class="card mb-3 shadow-sm">
            <div class="card-body">
                <h5 class="card-title">{{ $post->title }}</h5>
                <p class="card-text">{{ $post->content }}</p>
                <small class="text-muted">By {{ $post->user->name }}</small>

                @can('update', $post)
                    <a href="{{ route('posts.edit', $post) }}" class="btn btn-sm btn-warning">Edit</a>
                @endcan
                @can('delete', $post)
                    <form action="{{ route('posts.destroy', $post) }}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Delete?')">Delete</button>
                    </form>
                @endcan
            </div>
        </div>
    @endforeach
</div>
@endsection
