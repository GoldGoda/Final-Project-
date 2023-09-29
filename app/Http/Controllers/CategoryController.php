<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::with('products')->get();
        if(!$request->ajax()) return view("category");
        return response()->json($categories, 200);
    }

    public function getCategory(Request $request, $id)
    {
        if(!$request->ajax()) return view("category", compact('id'));
        $category = Category::with('products')->find($id);
        return response()->json($category, 200);
    }

    public function store(Request $request)
    {
        $category = new Category($request->all());
		$category->save();
		return response()->json([], 200);

    }
    public function edit(Request $request)
    {
        $category = Category::find( $request->id );
        $category->name = $request->name;
    }

    public function destroy(Request $request)
    {
        $category_id = $request->id;
        $category = Category::find( $category_id );
        $category->delete();
        return response()->json([], 200);
    }
}
