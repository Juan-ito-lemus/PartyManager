@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">Editar Orden</h1>
    <div class="card">
        <div class="card-body">
        {!! Form::model($order, ['route' => ['orders.update', $order->id], 'method' => 'PUT', 'files' => true]) !!}
                @csrf
                @method('PUT')
                @include('Forms.Orderform')
        </div>
    </div>
</div>
@endsection
