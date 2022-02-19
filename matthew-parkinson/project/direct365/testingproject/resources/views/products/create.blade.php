@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="wrapper create-product">
                <div class="container">
                    <div class="row justify-content-center">
                        <h1>Control Panel</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="flex-center position-ref">
        <a href="/products/createtheproduct">Click here to create new product</a>
    </div>
    <div class="flex-center position-ref">
        <a href="/products/createtheproduct/display">Click here to see all products</a>
    </div>
    <br />
    <div class="flex-center position-ref">
        <a href="/">Click here to go back home</a>
    </div>

@endsection
