@extends('layouts.pdfinicio')
@section('content')
<link rel="stylesheet" type="text/css" href="{{ public_path('css/pdf.css')}}">

<body>
    <div id="logo">
        <img src="{{ public_path('images/OIG.png') }}" alt="Logo" width="100">
    </div>
    <div class="container text-center">
        <h1>Detalles del Producto</h1>
        <table class="table ">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                    <th>Imagen</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->fee }}</td>
                    <td>{{ $product->price }}</td>
                    <td class="text-center">
                        <img src="{{ public_path('images/' . $product->image) }}" alt="Imagen del producto" width="100">
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
@endsection
