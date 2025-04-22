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
            ], 201); 
    }

    public function update(Request $request, $id) {
        $category = Category::findOrFail($id);

        if (!$category) {
            return response()->json([
                'success' => false,
                'message' => 'Category not found.',
            ], 404); // Not Found
        }

       $updateData=  $category->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Category update successfully.',
            'data' => $updateData,
        ], 200); 
    }

    public function destroy($id)
    {
        $category = Category::find($id);

        if (!$category) {
            return response()->json([
                'success' => false,
                'message' => 'Category not found.',
            ], 404); // Not Found
        }

        $category->delete();

        return response()->json([
            'success' => true,
            'message' => 'Category deleted successfully.',
        ], 200); // OK
    }

}
