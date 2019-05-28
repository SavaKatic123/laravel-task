@extends('layouts.app')

@section('content')
<div>
    <h2>Product:</h2>
</div>
<div>
    <dl class="dl-horizontal">
        <dt>Name:</dt>
        <dd>{{$product->name}}</dd>
        <dt>Created at:</dt>
        <dd>{{$product->created_at}}</dd>
        <dt>Description:</dt>
        <dd>{{$product->description}}</dd>
    </dl>
    <a class="btn btn-sm btn-default" href="{{URL::route('products.index')}}">Back to list</a>
  </div>
@stop