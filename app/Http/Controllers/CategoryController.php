<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index(Request $request)
    {
        $parent = $request->query('parent');

        $data = [];

        $categories = Category::where('parent', $parent)->get();

        $categories->map(function($category) use(&$data){
            array_push($data, [
                'name' => $category->name,
                'image' => $category->image,
                'children' => Category::where('parent', $category->id)->get()
            ]);
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
