<?php

namespace App\Http\Controllers;

use App\Models\Forum;
use Illuminate\Http\Request;

class ForumController extends Controller
{

    public function index(Request $request)
    {
        $parent = $request->query('parent');

        $data = [];

        $categories = Forum::where('parent', $parent)->get();

        $categories->map(function($forum) use(&$data){
            array_push($data, [
                'name' => $forum->name,
                'slug' => $forum->slug,
                'image' => $forum->image,
                'children' => Forum::where('parent', $forum->id)->get()
            ]);
        });

        return response()->json($data);
    }

    public function store(Request $request)
    {
        //
    }


    public function show($slug)
    {
        //
    }

    public function update(Request $request, Forum $forum)
    {
        //
    }

    public function delete(Forum $forum)
    {
        //
    }

    public function destroy(Forum $forum)
    {
        //
    }
}
