<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();

        return view('products.index', [
            'products' => $products
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(empty($request->description)) {
            return redirect()->back()->withInput()->withErrors(['Por favor, informe todos os campos!']);
        }

        $product = new Product();
        $product->sku = $request->sku;
        $product->name = $request->name;
        $product->path_image = $request->file('path_image')->store('images_products');
        $product->description = $request->description;
        $product->price = $request->price;
        $product->save();

        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('products.edit', [
            'product' => $product
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {

        $productBeforeUpdate = Product::find($product->id);

        $urlImage = $productBeforeUpdate->path_image;
        Storage::delete($urlImage);

        $product->sku = $request->sku;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->path_image = $request->file('path_image')->store('images_products');
        $product->price = $request->price;
        $product->save();

        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $productBeforeDelete = Product::find($product->id);

        $urlImage = $productBeforeDelete->path_image;
        Storage::delete($urlImage);

        $product->delete();

        return redirect()->route('products.index');
    }
}