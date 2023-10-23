@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">Editar Inventario</h1>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('inventory.update', $inventory->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="product_id">Producto</label>
                    <select class="form-control" id="product_id" name="product_id">
                        @foreach ($products as $product)
                            <option value="{{ $product->id }}" {{ $product->id === $inventory->product->id ? 'selected' : '' }}>
                                {{ $product->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="cantidad_disponible">Cantidad Disponible</label>
                    <input type="text" class="form-control" id="cantidad_disponible" name="cantidad_disponible" value="{{ $inventory->cantidad_disponible }}">
                </div>

                <div class="form-group">
                    <label for="estado">Estado</label>
                    <input type="text" class="form-control" id="estado" name="estado" value="{{ $inventory->estado }}">
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Actualizar Inventario</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
