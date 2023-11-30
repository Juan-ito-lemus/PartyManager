@extends('layouts.app')

@section('title', 'Alquileres')
@section('content')
<style>
    .card {
        background-color: #f1f1f1;
        border: none;
        border-radius: 10px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .card-title {
        font-size: 1.5rem;
    }

    .card-img-top {
        border-radius: 50%;
        width: 150px;
        height: 150px;
        object-fit: cover;
        margin: 0 auto;
        margin-top: 20px;
    }

    .btn-create-alquiler {
        background-color: #4CAF50;
        color: #fff;
    }

    .btn-create-alquiler:hover {
        background-color: #45a045;
    }

    .btn-generate-pdf {
        background-color: #FF5733;
        color: #fff;
    }

    .btn-generate-pdf:hover {
        background-color: #e64d2e;
    }
    .zoomable {
    transition: transform 0.3s ease-in-out; /* Agrega una transición suave */
    transform-origin: center center; /* Establece el origen de la transformación en el centro del objeto */
}

.zoomable:hover {
    transform: scale(1.2); /* Escala la imagen al 120% cuando el mouse pasa por encima */
}
</style>

<div class="container mt-5">
    <h1 class="text-center mb-4">Lista de Alquileres</h1>

    <div class="row">
        <div class="col-md-6">
            <form action="{{ route('search.clients') }}" method="GET" class="form-inline my-2 my-lg-0">
                <div class="input-group">
                    <input type="text" name="query" class="form-control" placeholder="Buscar..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-search"></i> Buscar
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-6 text-right">
            <a href="/Client/Create" class="btn btn-create-alquiler mb-3">Crear Alquiler</a>
            <a href="{{ route('listado.pdf') }}" class="btn btn-generate-pdf mb-3">Generar PDF</a>
        </div>
    </div>

    <div class="row">
        @foreach ($clients as $client)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="/images/{{ $client->image }}" class="card-img-top zoomable" alt="{{ $client->name }} {{ $client->lastname }}">
                    <div class="card-body">
                        <h5 class="card-title text-center">{{ $client->name }} {{ $client->lastname }}</h5>
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
                            <a href="{{ route('clients.edit', $client->id) }}" class="btn btn-primary">Editar</a>
                            <a href="{{ route('clients.show', $client->id) }}" class="btn btn-info">Ver Detalles</a>
                            <form method="POST" action="{{ route('clients.destroy', $client->id) }}" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Seguro que quieres eliminar a {{ $client->id }}: {{ $client->name }}')">Eliminar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
</section>
@endsection
