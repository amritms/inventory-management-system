@extends('layouts.app')

@section('content')
    <div class="container-fluid">

        <h1>Category list page</h1>
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
                    <th  scope="col">Actions</th>
                </tr>

                <?php foreach($categories as $category){ ?>
                <tr>
                    <td><?php echo $category->id;?></td>
                    <td><a href="{{ url('categories/'. $category->id) }}"> {{ $category->name }}</td>
                    <td><a href="{{url('categories/' . $category->id . '/edit')}}">Edit</a>

                <?php } ?>


            </table>
        </div>
    </div>
@endsection