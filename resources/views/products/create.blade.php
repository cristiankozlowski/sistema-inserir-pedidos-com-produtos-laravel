@extends('layout.master')

@section('content')

<div class="container">
    @if($errors->all())
        @foreach($errors->all() as $error)
            <div class="alert alert-danger">
                {{ $error }}
            </div>
        @endforeach
    @endif

    <h1>Cadastrar Produto</h1>

    <form action="{{ route('products.store') }}" method="post">
        @csrf

        <label for="sku">SKU</label>
        <input type="text" name="sku" class="form-control" placeholder="Digite o SKU do produto">

        <label for="name">Nome</label>
        <input type="text" name="name" class="form-control" placeholder="Digite o nome do produto">

        <label for="description">Descrição</label>
        <textarea name="description" id="description" class="form-control" cols="30" rows="10" placeholder="Digite a descrição do produto"></textarea>

        <label for="price">Preço</label>
        <input type="text" name="price" class="form-control" placeholder="Digite o preço do produto">

        <button type="submit" class="btn btn-sm btn-success mt-2">Cadastrar</button>
    </form>
</div>
@endsection
