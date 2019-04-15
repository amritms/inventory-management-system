@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ url('products/' . $product->id) }}" method="POST">
            @csrf
            @method('patch')
            <h1>Edit Product</h1>
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" value="{{ $product->name }}">
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <input type="text" name="description" class="form-control"  value="{{ $product->description }}">
            </div>

            <div class="form-group">
                <label for="category">Category</label>
                <input type="number" name="category_id" class="form-control"  value="{{ $product->category_id }}">
            </div>

            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" name="price" class="form-control" value="{{ $product->price }}">
            </div>

            <div class="form-group">
                <input type="submit" value="Save"  class="btn btn-primary">
            </div>
        </form>
    </div>
@endsection