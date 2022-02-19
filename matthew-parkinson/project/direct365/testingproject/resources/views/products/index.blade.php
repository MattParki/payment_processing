@extends('layouts.app')
@section('content')

<div class="wrapper product-index">
    <h1>Products</h1>

    @foreach($products as $product)
        <div class="product-item">
            <img src="/img/product.png" alt="product icon">
            <h4><a href="/products/{{ $product->id }}">{{ $product->name }} </a></h4><p class="testing1" id="testing1">Price: <p class="testing2" id="testing2">{{ $product->price }}</p><p class="testing1" id="testing1">Sku: <p class="testing2" id="testing2">{{ $product->sku }}</p><p class="testing1" id="testing1">Description: <p class="testing2" id="testing2">{{ $product->description }}</p><p class="testing1" id="testing1">Created at: <p class="testing2" id="testing2">{{ $product->created_at }}</p>

        </div>

    @endforeach
    <div>
        <p class="delete">{{ session('delete') }}</p>
    </div>
</div>

<div class="flex-center position-ref">
    <a href="/">Click here to go back home!</a>
</div>
<br />

@endsection
