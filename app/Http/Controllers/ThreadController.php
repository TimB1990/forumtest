<?php

namespace App\Http\Controllers;

use App\Models\Forum;
use App\Models\Thread;
use Illuminate\Http\Request;

class ThreadController extends Controller
{
    public function index(Request $request)
    {
        if(!$request->query('forum')) return response()->json(Thread::paginate(20));

        $threads = Thread::where('forum_id', $request->query('forum'))->paginate(20);
        return response()->json($threads);

    }

    public function store(Request $request)
    {
        //
    }


    public function show($slug)
    {
        //
    }

    public function update(Request $request, Thread $thread)
    {
        //
    }

    public function delete(Thread $thread)
    {
        //
    }

    public function destroy(Thread $thread)
    {
        //
    }
}
