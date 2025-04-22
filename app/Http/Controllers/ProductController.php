<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    public function index() {
        $categories = Product::get();
        return response()->json([
            'success' => true,
            'message' => 'Product retrieved successfully.',
            'data' => $categories
        ], 200); // 200 OK
    }
}
