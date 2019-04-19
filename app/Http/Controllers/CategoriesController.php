<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('categories.index', compact('categories'));
    }

    public function show($category)
    {
        $products = Product::where('category_id', $category)->get();

        return view('products.index', compact('products'));
    }
}
