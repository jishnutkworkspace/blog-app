@extends('layouts.app')

@section('content')
<div class="card shadow-sm">
    <div class="card-body">
        <h3>Edit Post</h3>
        <form action="{{ route('posts.update', $post) }}" method="POST">
            @csrf @method('PUT')
            <div class="mb-3">
                <label class="form-label">Title</label>
                <input type="text" name="title" value="{{ $post->title }}"
                       class="form-control @error('title') is-invalid @enderror">
                @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Content</label>
                <textarea name="content" rows="5"
                          class="form-control @error('content') is-invalid @enderror">{{ $post->content }}</textarea>
                @error('content') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <button class="btn btn-warning">Update Post</button>
        </form>
    </div>
</div>
@endsection
