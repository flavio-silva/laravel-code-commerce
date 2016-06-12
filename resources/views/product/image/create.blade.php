@extends('app')

@section('content')

<div class="container">
        <h1>Create Image</h1>
        @if ($errors->any())

                @foreach($errors->all() as $error)
                <div class="alert alert-danger">
                        {{$error}}
                </div>
                @endforeach
        @endif
        {!! Form::open(['route' => ['product.image.store', $productId], 'method' => 'post', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
                {!! Form::label('image', 'Image:') !!}
                {!! Form::file('image', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
        {!! Form::submit('Upload', ['class' => 'btn btn-primary form-control']) !!}
        </div>

        <div class="form-group">
            <a href="{{route('product.index')}}" class="btn btn-default form-control">Back</a>
        </div>

    {!! Form::close() !!}
</div>
@endsection