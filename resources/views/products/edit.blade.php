@extends('layout.master')

@section('content')
<div class="container">

    <h1>Editar Produto</h1>

    <form action="{{ route('products.update', [$product->id]) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')

        <label for="sku">SKU</label>
        <input type="text" name="sku" class="form-control" placeholder="Digite o SKU do produto" value="{{ $product->sku}}">

        <label for="name">Nome</label>
        <input type="text" name="name" class="form-control" placeholder="Digite o nome do produto" value="{{ $product->name }}">

        <label for="path_image">Imagem do Produto</label>
        <input type="file" name="path_image" class="form-control">

        <label for="description">Descrição</label>
        <textarea name="description" id="description" class="form-control" cols="30" rows="10" placeholder="Digite a descrição do produto">{{ $product->description }}</textarea>

        <label for="price">Preço</label>
        <input type="text" name="price" class="form-control mask_price" placeholder="Digite o preço do produto" value="{{ $product->price }}">

        <button type="submit" class="btn btn-sm btn-success mt-2">Editar produto</button>
    </form>
</div>
@endsection
