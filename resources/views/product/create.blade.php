@extends('app')

@section('content')

<div class="container">
        <h1>Create Category</h1>
        @if ($errors->any())

                @foreach($errors->all() as $error)
                <div class="alert alert-danger">
                        {{$error}}
                </div>
                @endforeach
        @endif
        {!! Form::open(['url' => 'product']) !!}
        <div class="form-group">
                {!! Form::label('name', 'Name:') !!}
                {!! Form::text('name', null, ['class' => 'form-control']) !!}
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
        {!! Form::close() !!}
        </div>
</div>
@endsection