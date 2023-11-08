@extends('layouts.pdfinicio')
@section('content')
<link rel="stylesheet" type="text/css" href="{{ public_path('css/pdf.css')}}">

<body>
    <div id="logo">
        PartyManager <img src="{{ public_path('images/OIG.png') }}" alt="Logo" width="100">
    </div>
    <div class="container  text-center">
        <h1>Detalles del inventario</h1>
        <table class="table ">
            <thead>
                <tr>
                    <th>Nombre del producto</th>
                    <th>Cantidad disponible</th>
                    <th class="text-center">Imagen del producto</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($inventory as $item)
                <tr>   
                    <td>{{ $item->product->name}}</td>
                    <td>{{ $item->cantidad_disponible }</td>
                    <td class="text-center">
                    <img src="{{ public_path('images/' . $item->product->image) }}" class="img-fluid mx-auto d-block" alt="{{ $item->product->name }}" width="100">
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
@endsection
