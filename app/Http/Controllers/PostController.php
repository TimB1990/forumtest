<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Thread;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Request $request)
    {
        if(!$request->query('topic')) return response()->json(Post::paginate(20));
        return Thread::where('slug', $request->query('topic'))->first()->posts;
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
