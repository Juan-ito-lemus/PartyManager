
    {{ csrf_field() }}

    <div class="form-group">
        {{ Form::label('product_id', 'Producto') }}
        {{ Form::select('product_id', $products->pluck('name', 'id'), null, ['class' => 'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::label('cantidad_disponible', 'Cantidad Disponible') }}
        {{ Form::number('cantidad_disponible', null, ['class' => 'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::label('estado', 'Estado') }}
        {{ Form::text('estado', null, ['class' => 'form-control']) }}
    </div>

    <a href="{{ route('inventory.index') }}" class="btn btn-primary">Volver a la Lista de inventario</a>
    {{ Form::submit('Agregar al Inventario', ['class' => 'btn btn-primary']) }}
{!! Form::close() !!}
