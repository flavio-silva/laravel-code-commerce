@extends('app')

@section('content')

<div class="container">
        <h1>Products</h1>
            
        <a href="{{route('product.create')}}" class="btn btn-default">New product</a>
        <br/>
        <br/>
        <table class="table">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Category</th>
                <th>Description</th>
                <th>Price</th>
                <th>Featured</th>
                <th>Recommend</th>
                <th>Action</th>
            </tr>
            @foreach($products as $product)
            <tr>
                <td>{{$product->id}}</td>
                <td>{{$product->name}}</td>
                <td>{{$product->category->name}}</td>
                <td>{{$product->description}}</td>
                <td>{{$product->price}}</td>
                <td>
                    @if ($product->featured)
                        {{'Yes'}}
                    @else
                        {{'No'}}
                    @endif
                </td>
                <td>
                    @if ($product->recommend)
                        {{'Yes'}}
                    @else
                        {{'No'}}
                    @endif
                </td>
                <td>
                    <a href="{{route('product.image.index', ['id' => $product->id])}}">Images</a>
                    |
                    <a href="{{route('product.destroy', ['id' => $product->id])}}">Delete</a>
                    |
                    <a href="{{route('product.edit', ['id' => $product->id])}}">Edit</a>
                </td>
            </tr>
            @endforeach
        </table>
    {!! $products->render()!!}
</div>
@endsection