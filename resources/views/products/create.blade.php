@extends('layouts.app')

@section('content')
    <div class="container">
    <form action="{{ url('products') }}" method="POST">
        @csrf

        <h1>Create New Product</h1>
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" >
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <input type="text" name="description" class="form-control" >
        </div>

        <div class="form-group">
            <label for="category">Category</label>
            <input type="number" name="category_id" class="form-control" >
        </div>

        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" name="price" class="form-control">
        </div>
        
        <div class="form-group">
            <input type="submit" value="Save"  class="btn btn-primary">
        </div>
    </form>
    </div>
@endsection