@extends('layouts.app')
@section('content')
<div class="wrapper create-product">
    <h1>All Products & prices</h1>

    <div>
        <div class="wrapper product-index">
            <div class="product-item">
                <img src="/img/product.png" alt="product icon">
                <h4>Current Price</h4>
                <h4></h4><p class="testing1" id="testing1">Product price: <p class="testing2" id="testing2">£ {{$product->price}}</p>
                <br />
                <br />
                <br />
                <div class="container">
                    <div class="justify-content-center">
                        <div class="justify-content-center">
                            <h4>Update the product details below</h4>
                        </div>
                        <div class="wrapper create-product">
                            <form action="{{ route('products.editProduct', ['id' => $product->id])}}" method="post">
                                @csrf
                                <input type="text"  name="name" placeholder="New name"><br />
                                <input type="text"  name="price" placeholder="New price"><br />
                                <input type="text"  name="sku" placeholder="New sku number"><br />
                                <input type="text"  name="description" placeholder="New description"><br />

                                <input type="submit">
                            </form>

                            <div class="delete">
                                <br />
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
        </div>
    </div>

    <br />

</div>
<div class="flex-center position-ref">
    <a href="/">Click here to go back home!</a>
</div>
<br />


@endsection
