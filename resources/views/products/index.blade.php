@extends('layout.master')

@section('content')
<div class="container">

    <h1>Produtos</h1>

    <table class="table table-striped products">
        <thead>
            <tr>
                <td>#id</td>
                <td>SKU</td>
                <td>Nome</td>
                <td>Imagem</td>
                <td>Descrição</td>
                <td>Preço</td>
                <td>Ações</td>
            </tr>
        </thead>

        <tbody>

        @foreach($products as $product)

            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->sku }}</td>
                <td>{{ $product->name }}</td>
                <td>
                    <img src="{{ env('APP_URL') }}/storage/{{ $product->path_image }}" class="product_img" alt="{{ $product->name }}">
                </td>
                <td>{{ $product->description }}</td>
                <td>{{ $product->price }}</td>
                <td>
                    <a href="{{ route('products.edit', [$product->id]) }}" class="btn btn-sm btn-warning mb-1">Editar</a>
                    <form action="{{ route('products.destroy', ['product' => $product]) }}" method="post">
                        @csrf
                        @method('delete')
                        <input type="submit" class="btn btn-sm btn-danger" value="Remover">
                    </form>
                </td>
            </tr>

        @endforeach

        </tbody>
    </table>
</div>
@endsection
