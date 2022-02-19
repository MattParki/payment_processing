@extends('layouts.app')
@section('content')
    <div class="wrapper product-details">
        <h1 class=""> Product Name: </h1><h3 class="alert-info">{{ $product->name }}</h3><br />
        <h1 class=""> Product Price: </h1><h3 class="alert-info">{{ $product->price }}</h3><br />
    </div>


    <a href="/">Click here to go back home</a>
@endsection
