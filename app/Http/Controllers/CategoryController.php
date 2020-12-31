<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        $data = null;
        $categories = Category::all();

        $categories->map(function($category) use(&$data) {

            // set data with forums still empty
            $data = ['img' => $category->image ,'name' => $category->name, 'forums' => null];

            $forums = [];

            $category->forums->map(function($forum) use(&$forums){
                array_map($forum, $forums);
            });

            $data['forums'] = $forums; 

        });

        return response()->json($data);

    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }


    public function show(Category $category)
    {
        //
    }


    public function edit(Category $category)
    {
        //
    }


    public function update(Request $request, Category $category)
    {
        //
    }

    public function delete(Category $category){
        //
    }

    public function destroy(Category $category)
    {
        //
    }
}
