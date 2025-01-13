<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function createPost(Request $request)
    {
        $incomingFields = $request->validate([
            'title' => ['required', 'min:3', 'max:255'],
            'body' => ['required', 'min:3'],
        ]);


        //strip content before saving on db
        $incomingFields['title'] = strip_tags($incomingFields['title']);
        $incomingFields['body'] = strip_tags($incomingFields['body']);
        $incomingFields['user_id'] = Auth::id();

        Post::create($incomingFields);

        return redirect('/');
    }

    public function showEditScreen(Post $post)
    {
        return view('edit-post', ['post' => $post]);
    }

    public function updatePost(Request $request, Post $post)
    {
        $incomingFields = $request->validate([
            'title' => ['required', 'min:3', 'max:255'],
            'body' => ['required', 'min:3'],
        ]);

        $incomingFields['title'] = strip_tags($incomingFields['title']);
        $incomingFields['body'] = strip_tags($incomingFields['body']);

        $post->update($incomingFields);

        return redirect('/');
    }
}
