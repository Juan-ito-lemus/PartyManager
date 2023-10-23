@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">Agregar Elemento al Inventario</h1>
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <form action="{{ route('inventory.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="product_id">Producto</label>
                    <select class="form-control" id="product_id" name="product_id">
                        @foreach ($products as $product)
                            <option value="{{ $product->id }}">{{ $product->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="cantidad_disponible">Cantidad Disponible</label>
                    <input type="number" class="form-control" id="cantidad_disponible" name="cantidad_disponible">
                </div>

                <div class="form-group">
                    <label for="estado">Estado</label>
                    <input type="text" class="form-control" id="estado" name="estado">
                </div>
                <a href="{{ route('inventory.index') }}" class="btn btn-primary">Volver a la Lista de inventario</a>
                <button type="submit" class="btn btn-primary">Agregar al Inventario</button>
            </form>
        </div>
    </div>
</div>
@endsection
