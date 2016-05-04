@extends('app')

@section('content')

<div class="container">
        <h1>Editing Product: {{$product->name}}</h1>
        @if ($errors->any())

                @foreach($errors->all() as $error)
                <div class="alert alert-danger">
                        {{$error}}
                </div>
                @endforeach
        @endif
        {!! Form::open(['route' => ['product.update', 'id' => $product->id], 'method' => 'put']) !!}
        <div class="form-group">
                {!! Form::label('name', 'Name:') !!}
                {!! Form::text('name', $product->name, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
                {!! Form::label('description', 'Description:') !!}
                {!! Form::textarea('description', $product->description, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
                {!! Form::label('price', 'Price:') !!}
                {!! Form::text('price', $product->price, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
                {!! Form::label('featured', 'Featured:') !!}
                {!! Form::checkbox('featured', 1, $product->featured) !!}
        </div>

        <div class="form-group">
                {!! Form::label('recommend', 'Recommend:') !!}
                {!! Form::checkbox('recommend', 1, $product->recommend) !!}
        </div>
        <div class="form-group">
        {!! Form::submit('Save', ['class' => 'btn btn-primary form-control']) !!}
        {!! Form::close() !!}
        </div>
</div>
@endsection