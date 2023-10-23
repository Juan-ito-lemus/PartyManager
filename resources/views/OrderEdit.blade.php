@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">Editar Orden</h1>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('orders.update', $order->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="cliente_id">Cliente</label>
                    <select class="form-control" id="cliente_id" name="cliente_id">
                        @foreach ($clients as $client)
                            <option value="{{ $client->id }}" {{ $client->id === $order->cliente_id ? 'selected' : '' }}>
                                {{ $client->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="fecha_pedido">Fecha Pedido</label>
                    <input type="date" class="form-control" id="fecha_pedido" name="fecha_pedido" value="{{ $order->fecha_pedido }}">
                </div>

                <div class="form-group">
                    <label for="fecha_entrega">Fecha de Entrega</label>
                    <input type="date" class="form-control" id="fecha_entrega" name="fecha_entrega" value="{{ $order->fecha_entrega }}">
                </div>

                <div class="form-group">
                    <label for="estado">Estado</label>
                    <input type="text" class="form-control" id="estado" name="estado" value="{{ $order->estado }}">
                </div>

                <button type="submit" class="btn btn-primary">Actualizar Orden</button>
            </form>
        </div>
    </div>
</div>
@endsection
