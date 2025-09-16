@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Create Post</h2>
    <form action="{{ route('posts.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Title</label>
            <input type="text" name="title" class="form-control" required minlength="3" value="{{ old('title') }}">
            @error('title') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <div class="mb-3">
            <label>Content</label>
            <textarea name="content" class="form-control" required>{{ old('content') }}</textarea>
            @error('content') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <button class="btn btn-success">Save</button>
    </form>
</div>
@endsection
