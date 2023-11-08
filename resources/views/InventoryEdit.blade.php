@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">Editar Inventario</h1>
    <div class="card">
        <div class="card-body">
        {!! Form::model($inventory, ['route' => ['inventory.update', $inventory->id], 'method' => 'PUT', 'files' => true]) !!}
                @csrf
                @method('PUT')
                @include('Forms.Inventoryform')
        </div>
    </div>
</div>
@endsection
