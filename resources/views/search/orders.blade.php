@extends('layouts.app')
@section('title', 'Resultados de Búsqueda')
@section('content')

<form action="{{ route('search.orders') }}" method="GET">
    <input type="text" name="query" placeholder="Buscar...">
    <button type="submit">Buscar</button>
</form>
@if ($results->count() > 0)
    @foreach ($results as $order)
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
        @endforeach
@else
    <p class="text-center mt-4">No se encontraron resultados para la consulta: <strong>{{ request('query') }}</strong></p>
@endif
        <div class="card-footer">
            <a href="{{ route('orders.index') }}" class="btn btn-primary">Volver a la Lista de Pedidos</a>
        </div>
    </div>
</div>
@endsection