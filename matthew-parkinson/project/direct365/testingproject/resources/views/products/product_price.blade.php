@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="wrapper create-product">
                <h1>Create a New Product & add price</h1>
                <form action="{{ route('products.storeProduct') }}" method="post">
                    @csrf
                    <label for="type">Choose Product Name</label>
                    <input type="text" name="name">
                    <label for="type">Set Product Price</label>
                    <input type="text" name="price"><br />
                    <label for="type">Set Product Sku Number</label>
                    <input type="text" name="sku"><br />
                    <label for="type">Set Product Description</label>
                    <input type="text" name="description">
                    <div class="flex-center position-ref">
                    </div>
                    <br />
                    <div class="flex-center position-ref">
                        <input type="submit" class="test123">
                    </div>
                </form>
                <!-- listing all of the products below that are created -->

                <br />
                <div class="flex-center position-ref">
                    <!-- success message if product is created -->
                    <p class="mssg2">{{ session('mssg2') }}</p>
                </div>


                     <!-- delete the products -->
                <div>
                    <p class="delete">{{ session('deletePrice') }}</p>
                </div>
            </div>
        </div>
    </div>
<div class="flex-center position-ref">
    <a href="/products/createtheproduct/display">Click here to see all products created</a>
</div>
<div class="flex-center position-ref">
    <a href="/">Click here to go back home!</a>
</div>
<br />
<div class="flex-center position-ref">
    <a href="/home"></a>
</div>

@endsection
