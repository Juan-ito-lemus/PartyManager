@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">Detalles del Pedido</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">#{{ $order->id }}</h5>
            <p class="card-text">Cliente: {{ $order->client->name }}</p>
            <p class="card-text">Fecha de Pedido: {{ $order->fecha_pedido }}</p>
            <p class="card-text">Fecha de Entrega: {{ $order->fecha_entrega }}</p>
            <p class="card-text">Estado: {{ $order->estado }}</p>
        </div>
        <div class="card-footer">
            <a href="{{ route('orders.index') }}" class="btn btn-primary">Volver a la Lista de Pedidos</a>
        </div>
    </div>
</div>
@endsection
