<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return response()->json($categories);
    }

    public function store(Request $request)
    {

        $request ->validate([
            "category_name"=> "required",
            "category_desc"=> "required",
            "category_img"=> "required",
        ]);


        $category = Category::create($request->all());
        return response()->json($category);
    }

    public function show($id)
    {
        $category = Category::find($id);

        if (! $category) {
            return response()->json(["message"=> "Category Not Found"],404);
        }
        return response()->json($category);
    }

    public function update(Request $request, $id)
    {
        $category = Category::find($id);

        if (! $category) {
            return response()->json(["message"=> "Category Not Found"],404);
        }

        $request ->validate([
            "category_name"=> "required",
            "category_desc"=> "required",
            "category_img"=> "required",
        ]);

        $category -> update($request->all());
        return response()->json($category);
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        if (! $category) {
            return response()->json(["message"=> "Category Not Found"],404);
        }

        $category -> delete();
        return response()->json($category);
    }

}
