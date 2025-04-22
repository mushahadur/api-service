<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    public function index() {
        $products = Product::orderBy('created_at', 'desc')
                   ->limit(10)
                   ->get();

        return response()->json([
            'success' => true,
            'message' => 'Product retrieved successfully.',
            'data' => $products
        ], 200); // 200 OK
    }

    public function create(ProductRequest $request) {
        
        $product = Product::create($request->all());

            return response()->json([
                'success' => true,
                'message' => 'Product created successfully.',
                'data' => $product,
            ], 201); 
    }

    public function update(Request $request, $id) {
        $product = Product::find($id);

        if (!$product) {
            return response()->json([
                'success' => false,
                'message' => 'Product not found.',
            ], 404); 
        }

       $updateData=  $product->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Product update successfully.',
            'data' => $updateData,
        ], 200); 
    }
    public function destroy($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json([
                'success' => false,
                'message' => 'Product not found.',
            ], 404); // Not Found
        }

        $product->delete();

        return response()->json([
            'success' => true,
            'message' => 'Product deleted successfully.',
        ], 200); // OK
    }

}
