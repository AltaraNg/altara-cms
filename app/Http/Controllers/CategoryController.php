<?php

namespace App\Http\Controllers;

use App\Category;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api')->except(['index', 'show']);
    }

    public function index()
    {
        $categories = Category::all();
        return response()->json(['categories' => $categories]);
    }
}

