@extends('templates.header.header')
<br />
<div class="login-bar">
</div>
<br />
<div class="flex-center position-ref full-height">
    <br />
    <div class="content">
        <img src="/img/" alt="product logo">
        <div class="title m-b-md">
            Direct365's Products
        </div>
        <div>
            <p class="mssg">{{ session('mssg') }}</p>
            <!-- the route is dynamically responding to the name we setup in the routes file -->
            <a href="{{ route('products.create') }}">Click here to order your product!</a>
        </div>
        <br />
    </div>
</div>

@extends('templates.footer.footer')
