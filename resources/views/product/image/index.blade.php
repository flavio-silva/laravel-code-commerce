@extends('app')

@section('content')

<div class="container">
        <h1>Images of {{$product->name}}</h1>
            
        <a href="{{route('product.image.create', ['id' => $product->id])}}" class="btn btn-default">New image</a>
        <br/>
        <br/>
        <table class="table">
            <tr>
                <th>Id</th>
                <th>Image</th>
                <th>Extension</th>
                <th>Action</th>
            </tr>
            @foreach($images as $image)
            <tr>
                <td>{{$image->id}}</td>
                <td><img src="{{url('uploads/' . $image->id . '.' . $image->extension)}}" width="80"/> </td>
                <td>{{$image->extension}}</td>
                <td>
                    <a href="{{route('product.image.destroy', ['id' => $image->id])}}">Delete</a>
                </td>
            </tr>
            @endforeach
        </table>
    {!! $images->render()!!}
</div>
@endsection