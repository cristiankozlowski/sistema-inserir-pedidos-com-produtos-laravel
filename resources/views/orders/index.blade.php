@extends('layout.master')

@section('content')
<div class="container">

    <h1>Pedidos</h1>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>#id</th>
                <th>Total</th>
                <th>Data de criação</th>
                <th>Detalhes</th>
            </tr>
        </thead>


        <tbody>

        @foreach($orders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->total }}</td>
                <td>{{ $order->publishFmt }}</td>
                <td>
                    <a href="{{ route('orders.show', [$order->id] )}}" class="btn btn-sm btn-info">Ver mais</a>
                </td>
            </tr>

        @endforeach

        </tbody>
    </table>
</div>
@endsection


