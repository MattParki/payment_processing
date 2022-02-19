@extends('layouts.app')
@section('content')
<div class="wrapper create-product">
    <div class="flex-center position-ref">
        <div class="wrapper product-details">
            <div class="wrapper product-index">
                <h1> Product: {{ $product->name }} </h1>
                    <p class="sku">Sku - {{ $product->sku }} </p>
                    <p class="price">Price - {{ $product->price }} </p>
                    <p class="description">Description - {{ $product->description }} </p>

                <div class="delete">
                    <form action="/products/{{ $product->id }}" method="post">
                        @csrf
                        @method('delete')
                        <button>Delete Product</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div>
    <a href="/products/createtheproduct/display" class="back"><- Back to all products</a>
</div>

@endsection
