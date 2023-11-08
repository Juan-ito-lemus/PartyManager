@extends('layouts.app')

@section('title', 'Inventario')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">Inventario</h1>

    <div class="row justify-content-center">
        <div class="col-md-6 text-center">
            <a href="/Inventory/create" class="btn btn-success mb-3">Agregar Existencia</a>
            <a href="{{ route('listado-inventario.pdf') }}" class="btn btn-danger mb-3">Generar PDF</a>
        </div>
    </div>

    <div class="row">
        @foreach ($inventory as $item)
        <div class="col-md-6 mt-4">
            <div class="card">
                <div class="row no-gutters">
                    <div class="col-md-5">
                        <img src="/images/{{ $item->product->image }}" class="img-fluid mx-auto d-block" alt="{{ $item->product->name }}" style="max-height: 200px;">
                    </div>
                    <div class="col-md-7">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->product->name }}</h5>
                            <p class="card-text"><strong>Cantidad Disponible:</strong> {{ $item->cantidad_disponible }}</p>
                            <p class="card-text"><strong>Estado:</strong> {{ $item->estado }}</p>
                            <a href="{{ route('inventory.show', $item->id) }}" class="btn btn-primary">Ver Detalles</a>
                        </div>
                        <div class="card-footer">
                            <div class="btn-group" role="group">
                                <a href="{{ route('inventory.edit', $item->id) }}" class="btn btn-success">Editar Inventario</a>
                                <form method="POST" action="{{ route('inventory.destroy', $item->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('¿Seguro que quieres eliminar este producto?')">Eliminar Producto</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
