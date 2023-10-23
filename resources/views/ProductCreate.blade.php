@extends('layouts.app')
@section('title', 'Crear Producto')
@section('content')

<div class="container mt-4">
    <h2 class="text-center">Crear Producto</h2>
    <div class="card" style="max-width: 800px; margin: 0 auto;">
        <div class="card-body">
            <form method="POST" action="/Products" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Nombre:</label>
                    <input type="text" name="name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Descripción:</label>
                    <textarea name="description" class="form-control" rows="3"></textarea>
                </div>
                <div class="mb-3">
                    <label for="fee" class="form-label">Producto disponible (cantidad):</label>
                    <input type="number" name="fee" class="form-control" required>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="price" class="form-label">Precio c/u:</label>
                        <div class="input-group">
                            <span class="input-group-text">$</span>
                            <input type="number" name="price" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="cost" class="form-label">Costo c/u:</label>
                        <div class="input-group">
                            <span class="input-group-text">$</span>
                            <input type="number" name="cost" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Seleccionar una foto:</label>
                    <input type="file" name="image" class="form-control-file" required>
                </div>
                <div class="text-center">
                    <a href="/Products" class="btn btn-secondary">Cancelar</a>
                    <button type="submit" class="btn btn-primary">Guardar Producto</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
