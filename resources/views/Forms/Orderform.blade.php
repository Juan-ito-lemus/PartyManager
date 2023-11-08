
    {{ csrf_field() }}

    <div class="form-group">
        {{ Form::label('cliente_id', 'Cliente') }}
        {{ Form::select('cliente_id', $clients->pluck('name', 'id'), null, ['class' => 'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::label('fecha_pedido', 'Fecha del Pedido') }}
        {{ Form::date('fecha_pedido', null, ['class' => 'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::label('fecha_entrega', 'Fecha de Entrega') }}
        {{ Form::date('fecha_entrega', null, ['class' => 'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::label('estado', 'Estado') }}
        {{ Form::text('estado', null, ['class' => 'form-control']) }}
    </div>

    <a href="/orders" class="btn btn-primary">Volver a la Lista de Pedidos</a>
    {{ Form::submit('Crear Orden', ['class' => 'btn btn-primary']) }}
{!! Form::close() !!}
