<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    // store comment
    public function store(Request $request, Post $post) {
        $datas = $request->validate([
            'body' => 'required'
        ]);

        $datas['user_id'] = auth()->id();
        $datas['post_id'] = $post->id;

        Comment::create($datas);

        return back()->with('message', 'Comment added!');
    }
}
