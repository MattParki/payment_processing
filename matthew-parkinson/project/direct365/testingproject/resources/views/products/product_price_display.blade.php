@extends('layouts.app')
@section('content')
    <div class="wrapper create-product">
        <div class="flex-center position-ref">
            <h1>All Products</h1>
        </div>
        <div>
            <div class="wrapper product-index">
                <ul>
                @foreach($products as $product)
                    <div class="product-item" style="padding-top:40px">
                        <img src="/img/image_icons.png" alt="product icon" width="60px" height="60px">
                        <h4 style="color:#0e1539; padding-left: 10px">{{ $product['name'] }}</h4><p class="testing1" id="testing1">Product price: <p class="testing2" id="testing2">£{{ $product->price }}</p><p class="testing1" id="testing1">Sku Number: <p class="testing2" id="testing2"> <p class="testing2" id="testing2">{{ $product->sku}}</p><p class="testing1" id="testing1">Description: <p class="testing2" id="testing2"> <p class="testing2" id="testing2">{{ $product->description}}</p><a href="/products/createtheproduct/display/product_edit/{{ $product->id }}"><p id="testing3">Edit</p></a>
                    </div>
                @endforeach
                </ul>
            <div class="flex-center position-ref">
                <div>
                    <!-- success message if product is created -->
                    <p class="mssg4">{{ session('mssg4') }}</p>
                </div>
                <div>
                    <!-- success message if product is created -->
                    <p class="mssg4">{{ session('delete') }}</p>
                </div>
            </div>
        </div>
        <br />
    </div>
    <div class="flex-center position-ref">
        <a href="/products/create">Click here to go back to control panel</a>
    </div>
    <div class="flex-center position-ref">
        <a href="/products/createtheproduct">Click here to create new product!</a>
    </div>
        /products/create
    <br />
    <div class="flex-center position-ref">
        <a href="/">Click here to go back home!</a>
    </div>


@endsection
