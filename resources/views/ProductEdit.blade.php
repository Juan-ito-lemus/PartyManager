@extends('layouts.app')

@section('title', 'Editar Producto')

@section('content')
<div class="container text-center">
    <h2>Editar Producto</h2>
</div>

<div class="container mt-4">
    <div class="card mx-auto" style="max-width: 800px;">
        <div class="card-body">
            <form method="POST" action="{{ route('products.update', $product->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="name" class="form-label">Nombre del Producto:</label>
                    <input type="text" name="name" class="form-control" value="{{ $product->name }}" required>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Descripción:</label>
                    <textarea name="description" class="form-control" required>{{ $product->description }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Precio por Unidad:</label>
                    <div class="input-group">
                        <span class="input-group-text">$</span>
                        <input type="number" name="price" class="form-control" value="{{ $product->price }}" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="cost" class="form-label">Costo por Unidad:</label>
                    <div class="input-group">
                        <span class="input-group-text">$</span>
                        <input type="number" name="cost" class="form-control" value="{{ $product->cost }}" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="fee" class="form-label">Producto Disponible:</label>
                    <input type="number" name="fee" class="form-control" value="{{ $product->fee }}" required>
                </div>

                <div class="text-center">
                    <a href="{{ route('products.show', $product->id) }}" class="btn btn-secondary">Cancelar</a>
                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
