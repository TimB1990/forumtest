<?php

namespace App\Http\Controllers;

use App\Models\Forum;
use App\Models\Thread;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class ThreadController extends Controller
{
    public function index(Request $request)
    {
        if (!$request->query('forum')) return response()->json(Thread::paginate(50));

        $threads = Thread::where('forum_id', $request->query('forum'))->paginate(50);
        return response()->json($threads);
    }

    public function latest(Request $request)
    {

        $forum_id = $request->query('forum');

        $forum = Forum::find($forum_id);

        if(!$forum) return;

        if($forum->threads->count()) {
            return $forum->threads->last();
        } else {
            $subforumIds = Forum::where('parent', $forum_id)->get()->map(function ($sub) {
                return $sub->threads->last()->id;
            });

            return Thread::find($subforumIds->max());
        }
    }

    public function count(){
        return Thread::all()->count();
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
