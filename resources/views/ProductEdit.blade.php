@extends('layouts.app')

@section('title', 'Editar Producto')

@section('content')
<div class="container text-center">
    <h2>Editar Producto</h2>
</div>

<div class="container mt-4">
    <div class="card mx-auto" style="max-width: 800px;">
        <div class="card-body">
        {!! Form::model($product, ['route' => ['products.update', $product->id], 'method' => 'PUT', 'files' => true]) !!}
              @csrf
                @method('PUT')
        @include('Forms.Productform')
        </div>
    </div>
</div>
@endsection
