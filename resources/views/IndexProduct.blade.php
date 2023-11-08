@extends('layouts.app')
@section('title', 'Productos')
@section('content')

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
                    <div class="col-md-5">
                        <img src="/images/{{ $product->image }}" class="img-fluid mx-auto d-block" alt="{{ $product->name }}" style="max-height: 200px;">
                    </div>
                    <div class="col-md-7">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text">{{ $product->description }}</p>
                            <p class="card-text">Cantidad: {{ $product->fee }}</p>
                            <p class="card-text">Precio: {{ $product->price }}</p>
                            <p class="card-text">Costo: ${{ $product->cost }}</p>
                            <a href="{{ route('products.show', $product->id) }}" class="btn btn-primary">Ver Detalles</a>
                        </div>
                        <div class="card-footer">
                            <div class="btn-group" role="group">
                                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-success">Editar Producto</a>
                                <form method="POST" action="{{ route('products.destroy', $product->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('¿Seguro que quieres eliminar a {{$product->name}}?')">Eliminar Producto</button>
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
