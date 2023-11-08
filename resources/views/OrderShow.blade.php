@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card" style="max-width: 300px; margin: 0 auto;">
        <div class="card-header bg-primary text-white">
            <h5 class="card-title">Detalles del Pedido</h5>
        </div>
        <div class="card-body">
            <p class="card-text"><strong>Cliente:</strong> {{ $order->client->name }}</p>
            <p class="card-text"><strong>Fecha de Pedido:</strong> {{ $order->fecha_pedido }}</p>
            <p class="card-text"><strong>Fecha de Entrega:</strong> {{ $order->fecha_entrega }}</p>
            <p class="card-text"><strong>Estado:</strong> {{ $order->estado }}</p>
        </div>
        <div class="card-footer text-center">
            <div class="btn-group" role="group" aria-label="Opciones">
                <a href="{{ route('orders.edit', $order->id) }}" class="btn btn-success">Editar</a>
                <form method="POST" action="{{ route('orders.destroy', $order->id) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('¿Seguro que quieres eliminar este pedido?')">Eliminar Pedido</button>
                </form>
            </div>
        </div>
    </div>
    <div class="text-center mt-3">
        <a href="/orders" class="btn btn-primary">Volver a la Lista de Pedidos</a>
    </div>
</div>
@endsection

