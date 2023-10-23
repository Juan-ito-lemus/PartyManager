@extends('layouts.app') @section('title', 'Editar Cliente') @section('content')

<div class="container mt-5"> <h1 class="text-center mb-4">Editar Cliente</h1> <div class="card shadow-lg" style="max-width: 800px; margin: 0 auto;"> <div class="card-body"> <form class="row g-3" method="POST" action="{{ route('clients.update', $client->id) }}" enctype="multipart/form-data"> @csrf @method('PUT')
            <div class="col-md-12">
                <div class="mb-3">
                    <label for="name" class="form-label">Nombre:</label>
                    <input type="text" name="name" class="form-control" value="{{$client->name}}" required>
                </div>
                <div class="mb-3">
                    <label for="lastname" class="form-label">Apellido:</label>
                    <input type="text" name="lastname" class="form-control" value="{{$client->lastname}}" required>
                </div>
                <div class="mb-3">
                    <label for="colony" class="form-label">Colonia:</label>
                    <input type="text" name="colony" class="form-control" value="{{$client->colony}}">
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Dirección:</label>
                    <input type="text" name="address" class="form-control" value="{{$client->address}}">
                </div>
                <div class="mb-3">
                    <label for="cellphone" class="form-label">Celular:</label>
                    <input type="text" name="cellphone" class="form-control" value="{{$client->cellphone}}">
                </div>
                <div class="mb-3">
                    <label for="debt" class="form-label">Deuda:</label>
                    <input type="number" name="debt" class="form-control" value="{{$client->debt}}" required>
                </div>
                <div class="mb-3">
                    <label for="debt_comment" class="form-label">Comentarios:</label>
                    <input type="text" name="debt_comment" class="form-control" value="{{$client->debt_comment}}">
                </div>
                @if($client->image)
                <div class="mb-2">
                    <label>Imagen actual:</label>
                    <img src="{{ asset('images/' . $client->image) }}" alt="Imagen actual" class="img-thumbnail" style="max-width: 200px;">
                </div>
                @endif
                <div class="mb-3">
                    <label for="image" class="form-label">Seleccionar una foto nueva (opcional):</label>
                    <input type="file" name="image" class="form-control">
                </div>
            </div>
            <div class="col-md-12 text-center">
                <a href="{{ route('clients.show', $client->id) }}" class="btn btn-secondary">Cancelar</a>
                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
            </div>
        </form>
    </div>
</div>