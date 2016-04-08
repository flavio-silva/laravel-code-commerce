@extends('welcome')

@section('content')
<h2>Lista de Produtos</h2>

<ul>
    @foreach($products as $product)
        <li>{{$product->name}}</li>
    @endforeach
</ul>
@endsection