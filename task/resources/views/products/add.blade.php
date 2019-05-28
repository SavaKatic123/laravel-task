@extends('layouts.app')

@section('content')
<div>
    <h2>Add Product:</h2>
</div>
<div>
    {{Form::open(array('route' => 'products.store', 'enctype'=>'multipart/form-data'))}}
        <div class="form-group<?php echo $errors->has('name') ? ' has-error' : ''; ?>">
            {{Form::label('name', 'Name:', array('class' => 'control-label'))}}
            {{Form::text('name', Input::old('name'), array('class' => 'form-control'))}}<br>
            {!! $errors->first('name', '<span class="text-danger">:message</span>') !!}
        </div>
        <div class="form-group<?php echo $errors->has('description') ? ' has-error' : ''; ?>">
            {{Form::label('description', 'Description:', array('class' => 'control-label'))}}
            {{Form::textarea('description', Input::old('description'), array('class' => 'form-control'))}}
            {!! $errors->first('name', '<span class="text-danger">:message</span>') !!}
        </div>
        <div class="form-group<?php echo $errors->has('price') ? ' has-error' : ''; ?>">
            {{Form::label('price', 'Price:', array('class' => 'control-label'))}}
            {{Form::text('price', Input::old('price'), array('class' => 'form-control'))}}<br>
            {!! $errors->first('name', '<span class="text-danger">:message</span>') !!}
        </div>
        <div class="form-group<?php echo $errors->has('price') ? ' has-error' : ''; ?>">
            {{Form::label('merchant_id', 'Merchant:', array('class' => 'control-label'))}}
            {{Form::select('merchant_id', $merchants, NULL, array('class' => 'form-control', 'id' => 'section-type'))}}        </div>
        <div>
            {{Form::label('status', 'Status:', array('class' => 'control-label'))}}
            {{Form::select('status', array(
                'in_stock' => 'In stock',
                'out_of_stock' => 'Out of stock'
              ), NULL, array('class' => 'form-control', 'id' => 'section-type'))}}
        </div>
        {{Form::submit('Add Product', array('class' => 'btn btn-success pull-right'))}}
        <a class="btn btn-sm btn-primary" href="{{URL::route('products.index')}}">Cancel</a>
    {{Form::close()}}

</div>
@stop
