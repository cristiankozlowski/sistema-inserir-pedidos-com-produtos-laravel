@extends('layout.master')

@section('content')

<div class="container">
    <h1>Pedido</h1>
    <p>Pedido: {{$order->id}}</p>
    <p>Criado em: {{$order->publishFmt}}</p>
    <p>Total: R$ {{$order->total}}</p>

    <h3>Produtos</h3>
    @if($products)

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Imagem</th>
                    <th>Preço</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>{{$product->name}}</td>
                        <td>
                            <img src="{{ url('/storage/' . $product->path_image) }}" alt="{{$product->name}}" width="50" height="auto">
                        </td>
                        <td>{{$product->price}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
