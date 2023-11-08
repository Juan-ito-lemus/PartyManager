@extends('layouts.pdfinicio')
@section('content')
<link rel="stylesheet" type="text/css" href="{{ public_path('css/pdf.css')}}">

<body>
    <div id="logo">
        <img src="{{ public_path('images/OIG.png') }}" alt="Logo" width="100">
    </div>
    <div class="container  text-center">
        <h1>Listado de pedidos</h1>
        <table class="table ">
            <thead>
                <tr>

                    <th>Cliente</th>
                    <th>Fecha de pedido</th>
                    <th class="text-center">Fecha de entrega</th>
                    <th class="text-center">estado</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($orders as $order)
                <tr>  
                    <td>{{ $order->client->name  }}</td>    
                    <td>{{  $order->fecha_pedido }}</td>
                    <td>{{ $order->fecha_entrega }}</td>
                    <td>{{ $order->estado }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
@endsection
