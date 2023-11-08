@extends('layouts.app') @section('title', 'Editar Cliente') @section('content')

<div class="container mt-5"> 
    <h1 class="text-center mb-4">Editar Cliente</h1>
 <div class="card shadow-lg" style="max-width: 800px; margin: 0 auto;"> <div class="card-body">
 {!! Form::model($client, ['route' => ['clients.update', $client->id], 'method' => 'PUT', 'files' => true]) !!}

            @include("Forms.Clientform")  
    </div>
</div>
@endsection