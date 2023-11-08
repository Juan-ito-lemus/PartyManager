@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">Agregar Elemento al Inventario</h1>
    <div class="row">
        <div class="col-md-6 offset-md-3">
        {!! Form::open(['route' => 'inventory.store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        @include('Forms.Inventoryform')
        </div>
    </div>
</div>
@endsection
