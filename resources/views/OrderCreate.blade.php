@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">Crear Orden</h1>
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <form action="{{ route('orders.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="cliente_id">Cliente</label>
                    <select class="form-control" id="cliente_id" name="cliente_id">
                        @foreach ($clients as $client)
                            <option value="{{ $client->id }}">{{ $client->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="fecha_pedido">Fecha del Pedido</label>
                    <input type="date" class="form-control" id="fecha_pedido" name="fecha_pedido">
                </div>

                <div class="form-group">
                    <label for="fecha_entrega">Fecha de Entrega</label>
                    <input type="date" class="form-control" id="fecha_entrega" name="fecha_entrega">
                </div>

                <div class="form-group">
                    <label for="estado">Estado</label>
                    <input type="text" class="form-control" id="estado" name="estado">
                </div>
                <a href="{{ route('orders.index') }}" class="btn btn-primary">Volver a la Lista de Pedidos</a>
                <button type="submit" class="btn btn-primary">Crear Orden</button>
            </form>
        </div>
    </div>
</div>
@endsection
