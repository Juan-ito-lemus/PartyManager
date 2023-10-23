@extends('layouts.app')
@section('title', 'Productos')
@section('content')
<div class="container">
    <h2 class="mt-4">Productos</h2>
    <a href="/Product/Create" class="btn btn-primary mb-3">Agregar producto</a>
    <div class="row">
        @foreach ($products as $product)
        <div class="col-md-6 mt-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">ID: {{ $product->id }}</h5>
                    <h5 class="card-title">{{ $product->name }}</h5>
                    <p class="card-text">{{ $product->description }}</p>
                    <p class="card-text">Cantidad: ${{ $product->fee }}</p>

                    <a href="{{ route('products.show', $product->id) }}" class="btn btn-primary">Ver Detalles</a>
                    <!-- Agrega botones para editar y eliminar si es necesario -->
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
