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
        $rules = [
            'sku' => 'required|max:16',
            'name' => 'required',
            'path_image' => 'required|image:jpeg,png',
            'price' => 'required'
        ];

        $messages = [
            'sku.required' => 'Por favor, preencha o campo SKU',
            'sku.max' => 'Este campo pode conter o máximo de 15 caracteres',
            'name.required' => 'Por favor, preencha o campo de nome do produto',
            'path_image.required' => 'Por favor, selecione uma imagem para o produto',
            'path_image.image' => 'A imagem deve ser no formato jpeg ou png',
            'price.required' => 'Por favor, preencha o campo preço'
        ];

        $request->validate($rules, $messages);

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

        $rules = [
            'sku' => 'required|max:16',
            'name' => 'required',
            'path_image' => 'required|image:jpeg,png',
            'price' => 'required'
        ];

        $messages = [
            'sku.required' => 'Por favor, preencha o campo SKU',
            'sku.max' => 'Este campo pode conter o máximo de 15 caracteres',
            'name.required' => 'Por favor, preencha o campo de nome do produto',
            'path_image.required' => 'Por favor, selecione uma imagem para o produto',
            'path_image.image' => 'A imagem deve ser no formato jpeg ou png',
            'price.required' => 'Por favor, preencha o campo preço'
        ];

        $request->validate($rules, $messages);

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
