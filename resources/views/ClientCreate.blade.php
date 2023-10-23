@extends('layouts.app')
@section('title', 'Client Create')
@section('content')
<div class="container mt-5">
    <h1 class="text-center">Crear alquiler</h1>

    <form method="POST" action="/Clients" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Nombre:</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="lastname">Apellido:</label>
            <input type="text" name="lastname" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="colony">Colonia:</label>
            <input type="text" name="colony" class="form-control">
        </div>

        <div class="form-group">
            <label for="address">Direccion:</label> 
            <input type="text" name="address" class="form-control">
        </div>

        <div class="form-group">
            <label for="cellphone">Celular:</label>
            <input type="text" name="cellphone" class="form-control">
        </div>

        <div class="form-group">
            <label for="debt">Abono:</label>
            <input type="number" name="debt" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="debt_comment">Comentarios:</label>
            <input type="text" name="debt_comment" class="form-control">
        </div>

        <div class="form-group">
            <label for="image">Seleccionar una foto:</label>
            <input type="file" name="image" class="form-control-file" required>
        </div>

        <a href="/Clients" class="btn btn-primary">Volver a la Lista de clientess</a>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
@endsection
