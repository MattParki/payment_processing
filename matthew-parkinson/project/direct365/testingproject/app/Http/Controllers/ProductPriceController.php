<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Product;

class ProductPriceController extends Controller
{


    //stores the product in the database
    public function storeProduct() {

        $product = new Product();

        $product->name     = request('name');
        $product->price    = request('price');
        $product->sku    = request('sku');
        $product->description    = request('description');

        $product->save();

        return redirect('/products/createtheproduct')->with('mssg2', 'Product created!');
    }

    public function editProduct($id)
    {

        $product = Product::findOrFail($id);

        $product->name     = request('name');
        $product->price    = request('price');
        $product->sku    = request('sku');
        $product->description    = request('description');

        $product->save();

        return redirect('/products/createtheproduct/display/')->with('mssg4', 'Product Updated!');
    }

    public function showProductToEdit($id)
    {
        $product = Product::find($id);

        return view('products.product_price_edit', ['product' => $product]);
    }

    public function show($id) {

        $product = Product::findOrFail($id);

        return view('products.product_price_show', ['product' => $product]);
    }

    public function display() {

        $products = Product::all();

//        dd($product);

        return view('products.product_price_display', ['products' => $products]);
    }


    //just shows the view when navigation to /products/createtheproduct
    public function createProduct() {
        return view('products.product_price');
    }

    //deletes the product if requested

    public function delete($id) {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect('/products/createtheproduct/display/')->with('delete', 'Product deleted successfully');
    }

}
