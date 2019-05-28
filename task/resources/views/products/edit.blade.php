@extends('layouts.app')

@section('content')
<div>
    <h2>Edit Product:</h2>
</div>
<div>
    {{Form::model($product, array('route' => array('products.update', $product->id), 'method' => 'PUT', 'enctype'=>'multipart/form-data'))}}
        <div>
            {{Form::label('name', 'Name:', array('class' => 'control-label'))}}
            {{Form::text('name', Input::old('name'), array('class' => 'form-control'))}}
            {!! $errors->first('name', '<span class="text-danger">:message</span>') !!}
        </div>
        <div>
            {{Form::label('description', 'Description:', array('class' => 'control-label'))}}
            {{Form::textarea('description', Input::old('description'), array('class' => 'form-control'))}}
            {!! $errors->first('description', '<span class="text-danger">:message</span>') !!}
        </div>
        <div>
            {{Form::label('price', 'Price:', array('class' => 'control-label'))}}
            {{Form::text('price', Input::old('price'), array('class' => 'form-control'))}}
            {!! $errors->first('price', '<span class="text-danger">:message</span>') !!}
        </div>
        <div>
            {{Form::label('merchant_id', 'Merchant:', array('class' => 'control-label'))}}
            {{Form::select('merchant_id', $merchants, $product->merchant_id, array('class' => 'form-control', 'id' => 'section-type'))}}
        </div>
        <div>
            {{Form::label('status', 'Status:', array('class' => 'control-label'))}}
            {{Form::select('status', array(
                'in_stock' => 'In stock',
                'out_of_stock' => 'Out of stock'
              ), $product->status, array('class' => 'form-control', 'id' => 'section-type'))}}
        </div>
        {{Form::submit('Edit', array('class' => 'btn btn-success pull-right'))}}
        <a class="btn btn-sm btn-primary" href="{{URL::route('products.index')}}">Cancel</a>
    {{Form::close()}}

</div>
@stop
