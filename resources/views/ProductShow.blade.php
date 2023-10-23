@extends('layouts.app')

@section('title', 'Detalles del Producto')

@section('content')
<div class="container mt-4">
    <h2 class="text-center">Detalles del Producto</h2>
    <div class="card">
        <div class="row g-0">
            <div class="col-md-5">
                <img src="/images/{{ $product->image }}" class="img-fluid mx-auto d-block" alt="{{ $product->name }}" style="max-height: 250px;">
            </div>
            <div class="col-md-7">
                <div class="card-body">
                    <h5 class="card-title">{{ $product->name }}</h5>
                    <p class="card-text">{{ $product->description }}</p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <strong>ID del Producto:</strong> {{ $product->id }}
                    </li>
                    <li class="list-group-item">
                        <strong>Precio por Unidad:</strong> ${{ $product->price }}
                    </li>
                    <li class="list-group-item">
                        <strong>Costo:</strong> ${{ $product->cost }}
                    </li>
                </ul>
                <div class="card-footer">
                    <div class="btn-group" role="group">
                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-success">Editar Producto</a>
                        <form method="POST" action="{{ route('products.destroy', $product->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar Producto</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container text-center mt-4">
    <a href="/Products" class="btn btn-primary">Volver a la lista de productos</a>
</div>
@endsection
