@extends('layouts.app')

@section('title', 'Detalles del Inventario')

@section('content')
<div class="container mt-4">
    <h1 class="text-center mb-4">Detalles del Inventario</h1>
    <div class="card" style="max-width: 400px; margin: 0 auto;">
        <img src="/images/{{ $inventory->product->image }}" class="card-img-top" alt="{{ $inventory->product->name }}" style="max-height: 250px;">
        <div class="card-body">
            <h5 class="card-title">{{ $inventory->product->name }}</h5>
            <p class="card-text"><strong>Cantidad Disponible:</strong> {{ $inventory->cantidad_disponible }}</p>
            <p class="card-text"><strong>Estado:</strong> {{ $inventory->estado }}</p>
        </div>
        <div class="card-footer">
            <a href="{{ route('inventory.index') }}" class="btn btn-primary">Volver a la Lista de Inventario</a>
            <form method="POST" action="{{ route('inventory.destroy', $inventory->id) }}">
                @csrf
                @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Seguro que quieres eliminar a {{$inventory->product->name }}?')">Eliminar Producto</button>
            </form>   
        </div>
    </div>
</div>
@endsection
