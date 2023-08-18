<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    // show all post
    public function index() {
        $posts = Post::latest()->filter(request(['search']))->paginate(10);
        // dd(request());
        // dd(request()->input('search'));

        return view('posts.index', ['posts' => $posts]);
    }

    // show single post
    public function show(Post $post) {
        return view('posts.show', ['post' => $post]);
    }

    // show create post form
    public function create() {
        return view('posts.create');
    }

    // store post
    public function store(Request $request) {
        $data = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'body' => 'required',
        ]);

        $data['user_id'] = auth()->id();

        Post::create($data);

        return redirect()
        ->route('posts.manage')
        ->with('message', 'Post added!');
    }

    // show edit post form
    public function edit(Post $post) {
        return view('posts.edit', ['post' => $post]);
    }

    // update post
    public function update(Request $request, Post $post) {
        // check if allowed
        if($post->user_id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }

        $data = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'body' => 'required',
        ]);

        $post->update($data);

        return back()->with('message', 'Post Updated!');
    }

    // destroy post
    public function destroy(Post $post) {
        // check if allowed
        if($post->user_id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }

        $post->delete();

        return redirect()
        ->route('posts.manage')
        ->with('message', 'Post Deleted!');
    }

    // manage post
    public function manage() {
        $posts = auth()->user()->posts()->latest()->paginate(10);
        return view('posts.manage', ['posts' => $posts]);
    }
}
