<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sistema de Pedidos</title>

    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    <nav class="menu mb-3">
        <ul>
            <li>
                <a href="{{ route('products.index') }}">Meus Produtos</a>
            </li>
            <li>
                <a href="{{ route('orders.index') }}">Meus Pedidos</a>
            </li>
            <li>
                <a href="{{ route('products.create') }}">Cadastrar Produto</a>
            </li>
            <li>
                <a href="{{ route('orders.create') }}">Inserir Pedido</a>
            </li>
        </ul>
    </nav>

    @yield('content')


<script src="{{ asset('js/jquery.js') }}"></script>
<script src="{{ asset('js/bootstrap.js') }}"></script>
<script src="{{ asset('js/jquery.mask.js') }}"></script>
<script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
