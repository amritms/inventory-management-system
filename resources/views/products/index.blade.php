@extends('layouts.app')

@section('content')
    <div class="container-fluid">

            <h1>This is product index page</h1>
        <div class="row">
            <div class="col-12">
        <a href="{{ url('products/create') }}"  class="btn btn-primary my-4 float-right">Create Product</a>
        </div>
        </div>
        <div class="row justify-content-center">
            <table class="table table-striped ">
                <tr>
                    <th  scope="col">Id</th>
                    <th  scope="col">Name</th>
                    <th  scope="col">Category</th>
                    <th  scope="col">Description</th>
                    <th  scope="col">price</th>
                    <th scope="col">Tags</th>
                    <th  scope="col">Actions</th>
                </tr>

            <?php foreach($products as $product){ ?>
                <tr>
               <td><?php echo $product->id;?></td>
               <td><?php echo $product->name;?></td>
               <td><?php echo $product->category->name;?></td>
               <td><?php echo $product->description;?></td>
               <td><?php echo $product->price;?></td>
                <td>
                    @foreach($product->tags as $tag)
                        <span class="badge badge-secondary"> {{ $tag->name }} </span>
                    @endforeach
                </td>
                <td>
                    <a href="{{ url('products/' . $product->id . '/edit') }}">Edit</a>
                    <form action="{{ url('products/' . $product->id) }}" method="POST">
                        @csrf
                        @method('delete')
                        <input type="submit" value="Delete">
                    </form>
                </td>
                </tr>
            <?php } ?>


            </table>
        </div>
    </div>
@endsection