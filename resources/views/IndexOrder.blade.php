@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">Lista de Pedidos</h1>

    <div class="row justify-content-center">
        <div class="col-md-6">
            <form action="{{ route('search.orders') }}" method="GET" class="form-inline my-2 my-lg-0">
                <div class="input-group">
                    <input type="text" name="query" class="form-control" placeholder="Buscar..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-search"></i> Buscar
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-6 text-center">
            <a href="/orders/create" class="btn btn-success mb-3">Crear Pedido</a>
            <a href="{{ route('listado-order.pdf') }}" class="btn btn-danger mb-3">Generar PDF</a>
        </div>
    </div>

    <div class="row justify-content-center">
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
                    <div class="card-footer text-center">
                        <form method="POST" action="{{ route('orders.destroy', $order->id) }}">
                            @csrf
                            @method('DELETE')
                            <div class="btn-group" role="group" aria-label="Opciones">
                                <a href="{{ route('orders.show', $order->id) }}" class="btn btn-primary">Ver Detalles</a>
                                <a href="{{ route('orders.edit', $order->id) }}" class="btn btn-success">Editar</a>
                                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Seguro que quieres eliminar este pedido?')">Eliminar Pedido</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
