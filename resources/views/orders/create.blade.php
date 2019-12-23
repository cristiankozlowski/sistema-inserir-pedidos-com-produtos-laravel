@extends('layout.master')

@section('content')

<div class="container">

    <h1>Inserir Pedido</h1>

    <form action="{{ route('orders.store') }}" method="post">
        @csrf

        <div class="form-group">
            <label for="publish_at">Data de criação</label>
            <input
                type="text"
                name="publish_at"
                class="form-control {{ ($errors->has('publish_at') ? 'is-invalid' : '') }}"
                value="{{ date('d/m/Y H:i') }}"
                required
            />
            @if($errors->has('publish_at'))
                <div class="invalid-feedback">
                    {{$errors->first('publish_at')}}
                </div>
            @endif
        </div>

        <div class="form-group">

            <label for="products">Selecione o(s) Produto(s)</label>
            <select multiple id="products" name="products[]"
                    class="form-control mb-3 {{ ($errors->has('products') ? 'is-invalid' : '') }}"

            >
                    @foreach($products as $product)
                        <option value="{{ $product->id }}">{{ $product->name}}</option>
                    @endforeach
            </select>
            @if($errors->has('products'))
                <div class="invalid-feedback">
                    {{$errors->first('products')}}
                </div>
            @endif
        </div>

        <div class="form-group">

            <label for="total">Total</label>
            <input type="text" name="total"
                    class="form-control mb-3 order_price_total {{ ($errors->has('total') ? 'is-invalid' : '') }}"
                    placeholder="Digite o valor total do produto"
                    value="{{old('total')}}"
                    required
            />
            @if($errors->has('total'))
                <div class="invalid-feedback">
                    {{$errors->first('total')}}
                </div>
            @endif
        </div>

        <button class="btn btn-sm btn-success" type="submit">Inserir pedido</button>
    </form>

</div>
@endsection
