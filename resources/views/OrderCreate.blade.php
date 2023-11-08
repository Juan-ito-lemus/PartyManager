@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">Crear Orden</h1>
    <div class="row">
        <div class="col-md-6 offset-md-3">
        {!! Form::open(['route' => 'orders.store', 'method' => 'POST']) !!}
        @include('Forms.Orderform')
        </div>
    </div>
</div>
@endsection
