@extends('app')

@section('content')

<div class="container">
        <h1>Editing Category: {{$category->name}}</h1>
        @if ($errors->any())

                @foreach($errors->all() as $error)
                <div class="alert alert-danger">
                        {{$error}}
                </div>
                @endforeach
        @endif
        {!! Form::open(['route' => ['category.update', 'id' => $category->id], 'method' => 'put']) !!}
        <div class="form-group">
                {!! Form::label('name', 'Name:') !!}
                {!! Form::text('name', $category->name, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
                {!! Form::label('description', 'Description:') !!}
                {!! Form::textarea('description', $category->description, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
        {!! Form::submit('Save', ['class' => 'btn btn-primary form-control']) !!}
        </div>

        <div class="form-group">
                <a href="{{route('category.index')}}" class="btn btn-default form-control">Back</a>
        </div>

        {!! Form::close() !!}
</div>
@endsection