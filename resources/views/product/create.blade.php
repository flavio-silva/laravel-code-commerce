@extends('app')

@section('content')

<div class="container">
        <h1>Create Product</h1>
        @if ($errors->any())

                @foreach($errors->all() as $error)
                <div class="alert alert-danger">
                        {{$error}}
                </div>
                @endforeach
        @endif
        {!! Form::open(['route' => 'product.index']) !!}
        <div class="form-group">
                {!! Form::label('name', 'Name:') !!}
                {!! Form::text('name', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
                {!! Form::label('category_id', 'Category:') !!}
                {!! Form::select('category_id', $categories, null, ['placeholder' => 'Select a category ', 'class' => 'form-control']) !!}
        </div>

        <div class="form-group">
                {!! Form::label('description', 'Description:') !!}
                {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
                {!! Form::label('price', 'Price:') !!}
                {!! Form::text('price', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
                {!! Form::label('featured', 'Featured:') !!}
                {!! Form::checkbox('featured', 1) !!}
        </div>

        <div class="form-group">
                {!! Form::label('recommend', 'Recommend:') !!}
                {!! Form::checkbox('recommend', 1) !!}
        </div>

        <div class="form-group">
        {!! Form::submit('Save', ['class' => 'btn btn-primary form-control']) !!}
        </div>

        <div class="form-group">
            <a href="{{route('product.index')}}" class="btn btn-default form-control">Back</a>
        </div>

    {!! Form::close() !!}
</div>
@endsection