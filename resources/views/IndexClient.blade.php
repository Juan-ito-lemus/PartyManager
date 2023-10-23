@extends('layouts.app')
@section('title', 'Alquileres')
@section('content')

<div class="container mt-5">
    <h1 class="text-center mb-4">Lista de alquileres</h1>

    <a href="/Client/Create" class="btn btn-primary mb-3">Crear Alquiler</a>

    <div class="row">
        @foreach ($clients as $client)
        <div class="col-md-4 mb-4">
            <div class="card" style="width: 18rem;">
                <img src="/images/{{ $client->image }}" class="card-img-top rounded-circle mx-auto mt-3" alt="{{ $client->name }} {{ $client->lastname }}" style="width: 150px; height: 150px;">
                <div class="card-body">
                    <h5 class="card-title text-center">{{ $client->id }}: {{ $client->name }} {{ $client->lastname }}</h5>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><strong>Colonia:</strong> {{ $client->colony }}</li>
                        <li class="list-group-item"><strong>Dirección:</strong> {{ $client->address }}</li>
                        <li class="list-group-item"><strong>Celular:</strong> {{ $client->cellphone }}</li>
                        <li class="list-group-item"><strong>Abono:</strong> {{ $client->debt }}</li>
                        <li class="list-group-item"><strong>Comentarios:</strong> {{ $client->comment }}</li>
                    </ul>
                </div>
                <div class="card-footer">
    <div class="d-flex justify-content-between">
    <a href="{{ route('clients.edit', $client->id) }}" class="btn btn-success">Editar</a>
        <a href="{{ route('clients.show', $client->id) }}" class="btn btn-primary">Ver Detalles</a>
        <form method="POST" action="{{ route('clients.destroy', $client->id) }}" style="display: inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Seguro que quieres eliminar a {{ $client->id }}: {{ $client->name }}')">Eliminar</button>
        </form>
    </div>
</div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection

