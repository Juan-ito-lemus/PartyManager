@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">Página de Inicio</h1>

    <div class="row">
        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-body">
                    <h2 class="card-title">Clientes</h2>
                    <p class="card-text">Administra los clientes de tu aplicación.</p>
                    <a href="/Clients" class="btn btn-primary">Ver Clientes</a>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-body">
                    <h2 class="card-title">Productos</h2>
                    <p class="card-text">Administra los productos de tu inventario.</p>
                    <a href="/Products" class="btn btn-primary">Ver Productos</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-body">
                    <h2 class="card-title">Inventario</h2>
                    <p class="card-text">Controla el inventario de tus productos.</p>
                    <a href="/Inventory" class="btn btn-primary">Ver Inventario</a>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-body">
                    <h2 class="card-title">Pedidos</h2>
                    <p class="card-text">Gestiona los pedidos realizados por los clientes.</p>
                    <a href="{{ route('orders.index') }}" class="btn btn-primary">Ver Pedidos</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
