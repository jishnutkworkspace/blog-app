<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;


class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $posts = Post::with('user')->latest()->get();
        return view('posts.index', compact('posts'));
    }


    public function create()
    {
        return view('posts.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'title'   => 'required|min:3',
            'content' => 'required',
        ]);

        Auth::user()->posts()->create([
            'title'   => $request->title,
            'content' => $request->content,
        ]);

        return redirect()->route('posts.index')
                         ->with('success', 'Post created successfully!');
    }


    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }


    public function edit(Post $post)
    {

        if ($post->user_id !== Auth::id()) {
            abort(403, 'Unauthorized');
        }

        return view('posts.edit', compact('post'));
    }


    public function update(Request $request, Post $post)
    {
        if ($post->user_id !== Auth::id()) {
            abort(403, 'Unauthorized');
        }

        $request->validate([
            'title'   => 'required|min:3',
            'content' => 'required',
        ]);

        $post->update([
            'title'   => $request->title,
            'content' => $request->content,
        ]);

        return redirect()->route('posts.index')
                         ->with('success', 'Post updated successfully!');
    }


    public function destroy(Post $post)
    {
        if ($post->user_id !== Auth::id()) {
            abort(403, 'Unauthorized');
        }

        $post->delete();

        return redirect()->route('posts.index')
                         ->with('success', 'Post deleted successfully!');
    }
}
