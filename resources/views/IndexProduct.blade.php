@extends('layouts.app')
@section('title', 'Productos')
@section('content')

<head>
    <style>
.zoomable {
    transition: transform 0.3s ease-in-out; /* Agrega una transición suave */
    transform-origin: center center; /* Establece el origen de la transformación en el centro del objeto */
}

.zoomable:hover {
    transform: scale(1.2); /* Escala la imagen al 120% cuando el mouse pasa por encima */
}
    </style>
</head>
<div class="container mt-5">
    <h1 class="text-center mb-4">Productos</h1>

    <div class="row justify-content-center">
        <div class="col-md-6 text-center">
            <a href="/Product/Create" class="btn btn-success mb-3">Crear producto</a>
            <a href="{{ route('listado-producto.pdf') }}" class="btn btn-danger mb-3">Generar PDF</a>
        </div>
    </div>

    <div class="row">
    @foreach ($products as $product)
    <div class="col-md-6 mt-4">
        <div class="card">
            <div class="row no-gutters">
                <div class="col-md-12">
                    <img src="/images/{{ $product->image }}" class="img-fluid mx-auto d-block zoomable" alt="{{ $product->name }}" style="max-height: 200px;">
                </div>
                    <div class="col-md-12">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <ul class="list-group">
                                <li class="list-group-item"><strong>Descripción:</strong> {{ $product->description }}</li>
                                <li class="list-group-item"><strong>Disponibilidad:</strong> {{ $product->fee }}</li>
                                <li class="list-group-item"><strong>Precio:</strong> {{ $product->price }}</li>
                                <li class="list-group-item"><strong>Costo:</strong> ${{ $product->cost }}</li>
                            </ul>
                        </div>
                        <div class="card-footer text-center">
                            <div class="btn-group" role="group" aria-label="Opciones">
                                <a href="{{ route('products.show', $product->id) }}" class="btn btn-outline-primary">Ver Detalles</a>
                                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-outline-success">Editar Producto</a>
                                <form method="POST" action="{{ route('products.destroy', $product->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger" onclick="return confirm('¿Seguro que quieres eliminar a {{$product->name}}?')">Eliminar Producto</button>
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
