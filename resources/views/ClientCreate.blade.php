@extends('layouts.app')
@section('title', 'Client Create')
@section('content')
<div class="container mt-5">
    <h1 class="text-center">Crear alquiler</h1>
    {!! Form::open(['route' => 'Clients.store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}

    @include('Forms.Clientform')
</div>
@endsection
