@extends('layouts.app')
@section('title', 'Crear Producto')
@section('content')

<div class="container mt-4">
    <h2 class="text-center">Crear Producto</h2>
    <div class="card" style="max-width: 800px; margin: 0 auto;">
        <div class="card-body">
        {!! Form::open(['route' => 'Products.store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                @csrf
        @include('Forms.Productform')
        </div>
    </div>
</div>
@endsection
