<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\Tag;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::where('user_id', auth()->id())->get();

        return view('products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::where('status', 1)->get();
        $tags = Tag::where('status', 1)->get();

        return view('products.create', compact('categories', 'tags'));
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $input['user_id'] = auth()->id();
        $product = Product::create($input);
//dd($product);
        $product->tags()->sync($input['tags']);
        return redirect(url('products'));
    }

    public function edit($product)
    {
        $product = Product::with('tags')->find($product);
        $categories = Category::all();
        $tags = Tag::where('status', 1)->get();
//dd($product);
        return view('products.edit')->with(['product'=> $product, 'categories' => $categories, 'tags' => $tags]);
    }

    public function update(Request $request, $product)
    {
        $product = Product::find($product);

        $product->name = $request->get('name');
        $product->description = $request->get('description');
        $product->price = $request->get('price');
        $product->category_id = $request->get('category_id');

        $product->save();

        $product->tags()->sync($request->get('tags'));

        return redirect(url('products'));
    }

    public function destroy($product)
    {
        $product = Product::find($product);
        $product->delete();

        return redirect(url('products'));
    }
}
