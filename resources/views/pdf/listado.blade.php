@extends('layouts.pdfinicio')
@section('content')
<link rel="stylesheet" type="text/css" href="{{ public_path('css/pdf.css')}}">

<body>
<div id="logo">
        <img src="{{ public_path('images/OIG.png') }}" alt="Logo" width="100">
    </div>
    <div class="container text-center">
        <h1>Detalles del Cliente</h1>
        <table class="table ">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th class="text-center">Imagen</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($clients as $client)
                <tr>
                    <td>{{ $client->name }}</td>
                    <td>{{ $client->lastname }}</td>
                    <td class="text-center">
                        <img src="{{ public_path('images/' . $client->image) }}" alt="image" width="100">
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
@endsection
