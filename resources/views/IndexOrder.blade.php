@extends('layouts.app')
@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">Lista de Pedidos</h1>
    <a href="/orders/create" class="btn btn-primary mb-3">Crear pedido</a>
    <div class="row">
        @foreach ($orders as $order)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">#{{ $order->id }}</h5>
                        <ul class="list-group">
                            <li class="list-group-item"><strong>Cliente:</strong> {{ $order->client->name }}</li>
                            <li class="list-group-item"><strong>Fecha de Pedido:</strong> {{ $order->fecha_pedido }}</li>
                            <li class="list-group-item"><strong>Fecha de Entrega:</strong> {{ $order->fecha_entrega }}</li>
                            <li class="list-group-item"><strong>Estado:</strong> {{ $order->estado }}</li>
                        </ul>
                    </div>
                    <div class="card-footer">
    <div class="d-flex justify-content-between">
        <a href="{{ route('orders.show', $order->id) }}" class="btn btn-primary">Ver Detalles</a>
        <a href="{{ route('orders.edit', $order->id) }}" class="btn btn-success">Editar</a>
        <form method="POST" action="{{ route('orders.destroy', $order->id) }}">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger " onclick="return confirm('Seguro que quieres eliminar este pedido?')">Eliminar Pedido</button>
        </form>
    </div>
</div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
