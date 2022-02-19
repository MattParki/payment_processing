<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Product;

class ProductController extends Controller
{

    public function index() {


        $products = Product::latest()->get();

        return view('products.index', [
            'products' => $products,
        ]);
    }

    public function show($id) {

        $product = Product::latest()->findOrFail($id);

        return view('products.show', ['product' => $product]);
    }

    public function create() {
        return view('products.create');
    }

    public function store() {

        $product = new Product();

        $product->name     = request('name');
        $product->sku     = request('sku');
        $product->price     = request('price');
        $product->description = request('description');

        $product->save();

        return redirect('/')->with('mssg', 'Thanks for your order!');
    }

    public function delete($id) {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect('/products/createtheproduct/display/')->with('delete', 'Product Deleted Successfully!');
    }
}
