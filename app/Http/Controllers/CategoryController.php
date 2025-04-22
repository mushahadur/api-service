<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    public function index() {
        $categories = Category::get();
        return response()->json([
            'success' => true,
            'message' => 'Categories retrieved successfully.',
            'data' => $categories
        ], 200);
    }

    public function create(CategoryRequest $request) {
        $category = Category::create($request->all());
            return response()->json([
                'success' => true,
                'message' => 'Category created successfully.',
                'data' => $category,
            ], 201); // HTTP 201 Created
    }

    public function update(Request $request, $id) {
        $category = Category::findOrFail($id);
        $category->update($request->all());
        return $category;
    }

    public function destroy($id) {
        Category::destroy($id);
        return response()->json(['message' => 'Deleted']);
    }
}
