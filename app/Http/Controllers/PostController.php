<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        //
    }

    public function latest(Request $request){
        $thread_id = $request->query('thread');
        return Post::where('thread_id', $thread_id)->orderBy('created_at', 'desc')->first();

    }

    public function store(Request $request)
    {
        //
    }


    public function show(Post $post)
    {
        //
    }

    public function update(Request $request, Post $post)
    {
        //
    }

    public function delete(Post $post)
    {
        //
    }

    public function destroy(Post $post)
    {
        //
    }
}
