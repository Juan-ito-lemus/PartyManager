@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">Inventario</h1>
    <a href="/Inventory/create" class="btn btn-primary mb-3">Agregar articulo</a>
    <div class="row">
        @foreach ($inventory as $item)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="/images/{{ $item->product->image }}" class="img-fluid mx-auto d-block" alt="{{ $item->product->name }}" style="max-height: 250px;">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="product_id">Producto</label>
                            <div class="" id="product_id" name="product_id">
                                <option value="{{ $item->product->id }}">{{ $item->product->name }}</option>
                            </div>
                        </div>
                        <p class="card-text">Cantidad Disponible: {{ $item->cantidad_disponible }}</p>
                        <p class="card-text">Estado: {{ $item->estado }}</p>
                    </div>
                    <div class="card-footer">
                        <form method="POST" action="{{ route('inventory.destroy', $item->id) }}">
                            @csrf
                            @method('DELETE')
                            
                            @foreach ($inventory as $item)
                             <a href="{{ route('inventory.edit', $item->id) }}" class="btn btn-success">Editar Inventario</a>
                            @endforeach
                            <button type="submit" class="btn btn-danger">Eliminar Producto</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
