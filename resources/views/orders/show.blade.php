@extends('layout.master')

@section('content')

<div class="container">
    <h1>Pedido</h1>
    <p>Pedido: {{$order->id}}</p>
    <p>Criado em: {{$order->publishFmt}}</p>
    <p>Total: R$ {{$order->total}}</p>

    <h3>Produtos</h3>
    @if($products)
        @foreach($products as $product)
            <p>{{$product->name}} {{$product->price}}</p>
        @endforeach
    @endif
</div>
@endsection
