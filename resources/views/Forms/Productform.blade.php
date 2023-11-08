
<div class="mb-3">
    {{ Form::label('name', 'Nombre:', ['class' => 'form-label']) }}
    {{ Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) }}
</div>

<div class="mb-3">
    {{ Form::label('description', 'Descripción:', ['class' => 'form-label']) }}
    {{ Form::textarea('description', null, ['class' => 'form-control', 'rows' => 3]) }}
</div>

<div class="mb-3">
    {{ Form::label('fee', 'Producto disponible (cantidad):', ['class' => 'form-label']) }}
    {{ Form::number('fee', null, ['class' => 'form-control', 'required' => 'required']) }}
</div>

<div class="row">
    <div class="col-md-6 mb-3">
        {{ Form::label('price', 'Precio c/u:', ['class' => 'form-label']) }}
        <div class="input-group">
            <span class="input-group-text">$</span>
            {{ Form::number('price', null, ['class' => 'form-control', 'required' => 'required']) }}
        </div>
    </div>
    <div class="col-md-6 mb-3">
        {{ Form::label('cost', 'Costo c/u:', ['class' => 'form-label']) }}
        <div class="input-group">
            <span class="input-group-text">$</span>
            {{ Form::number('cost', null, ['class' => 'form-control', 'required' => 'required']) }}
        </div>
    </div>
</div>

<div class="mb-3">
    {{ Form::label('image', 'Seleccionar una foto:', ['class' => 'form-label']) }}
    {{ Form::file('image', ['class' => 'form-control-file', 'required' => 'required']) }}
</div>

<div class="text-center">
    <a href="/Products" class="btn btn-secondary">Cancelar</a>
    {{ Form::submit('Guardar Producto', ['class' => 'btn btn-primary']) }}
</div>
{!! Form::close() !!}