@extends('layout.master')

@section('content')

<div class="container">

    <h1>Inserir Pedido</h1>

    <form action="{{ route('orders.store') }}" method="post">
        @csrf

        <label for="publish_at">Data de criação</label>
        <input type="text" name="publish_at" class="form-control" placeholder="Ex.: 01/01/1995 15:15:00">

        <label for="products">Selecione o(s) Produto(s)</label>
        <select multiple id="products" name="products[]" class="form-control mb-3">
            @foreach($products as $product)
                <option value="{{ $product->id }}">{{ $product->name}}</option>
            @endforeach
        </select>

        <label for="total">Total</label>
        <input type="text" name="total" class="form-control mb-3" placeholder="Ex.: 300.00">

        <button class="btn btn-sm btn-success" type="submit">Inserir pedido</button>
    </form>

</div>
@endsection
