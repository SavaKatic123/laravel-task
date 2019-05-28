@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Product List</div>

                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Name</th>
                      <th scope="col">Price</th>
                      <th scope="col">Options</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($products as $product)
                      <tr>
                        <td>{{$product->id}}</td>
                        <td>{{$product->name}}</td>
                        <td>{{$product->price}}</td>
                        <td class="d-flex">
                          <a href="<?php echo URL::to('/products/' . $product->id . '/edit') ?>" class="btn btn-info">Edit</a>
                          {{Form::open(['method'  => 'DELETE', 'route' => ['products.destroy', $product->id]])}}
                            <input type="submit" value="Delete" class="btn btn-danger">
                          {{ Form::close() }}
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
                <a href="<?php echo URL::to('/products/create') ?>" class="btn btn-success">Add</a>
            </div>
        </div>
    </div>
</div>
@endsection
