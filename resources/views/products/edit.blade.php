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
                {{--<input type="number" name="category_id" class="form-control"  value="{{ $product->category_id }}">--}}
                <select name="category_id" class="form-control">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}"
                                @if($category->id == $product->category_id) selected="selected" @endif
                        >{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" name="price" class="form-control" value="{{ $product->price }}">
            </div>

            <div class="form-group">
                <label for="tags">Tags</label>
                <select name="tags[]" multiple>
                    @php
                        $product_tags = [];
                        foreach($product->tags as $product_tag){
                        $product_tags[] = $product_tag->id;
                    } @endphp

                    @foreach($tags as $tag)
                        <option value="{{ $tag->id }}"
                                @if(in_array($tag->id, $product_tags)) selected="selected" @endif
                        >{{ $tag->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <input type="submit" value="Save"  class="btn btn-primary">
            </div>
        </form>
    </div>
@endsection