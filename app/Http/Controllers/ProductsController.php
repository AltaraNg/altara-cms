<?php

namespace App\Http\Controllers;

use App\Product;

class ProductsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api')->except(['index', 'show']);
    }

    public function index()
    {
        $products = Product::orderByRaw('RAND()')
            ->where('popularity', 3)
            ->take(12)
            ->with(['brand' => function ($query) {
                return $query->select('id', 'name');
            }])
            ->get();

        return response()->json(['products' => $products]);
    }

    public function show($id)
    {
        $products = Product::where('category_id', $id)
            ->with(['brand' => function ($query) {
                return $query->select('id', 'name');
            }])
            ->get();

        return response()->json(['products' => $products]);
    }
}
