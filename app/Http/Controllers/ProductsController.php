<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $input = $request->all();

        $input['user_id'] = 1;

        Product::create($input);

        return redirect(url('products'));
    }

    public function edit($product)
    {
        $product = Product::find($product);

        return view('products.edit')->with('product', $product);
    }

    public function update(Request $request, $product)
    {
        $product = Product::find($product);

        $product->name = $request->get('name');
        $product->description = $request->get('description');
        $product->price = $request->get('price');
        $product->category_id = $request->get('category_id');

        $product->save();

        return redirect(url('products'));
    }

    public function destroy($product)
    {
        $product = Product::find($product);
        $product->delete();

        return redirect(url('products'));
    }
}
