@extends('welcome')
@section('content')
    <h2>Lista de Caregorias</h2>
    <ul>
    @foreach($categories as $category)
    <li>{{ $category->name }}</li>
    @endforeach
    </ul>
@endsection