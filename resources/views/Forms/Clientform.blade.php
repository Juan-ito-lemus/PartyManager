
    {{ csrf_field() }}
    <div class="form-group">
        {{ Form::label('name', 'Nombre:') }}
        {{ Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) }}
    </div>

    <div class="form-group">
        {{ Form::label('lastname', 'Apellido:') }}
        {{ Form::text('lastname', null, ['class' => 'form-control', 'required' => 'required']) }}
    </div>

    <div class="form-group">
        {{ Form::label('colony', 'Colonia:') }}
        {{ Form::text('colony', null, ['class' => 'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::label('address', 'Direccion:') }}
        {{ Form::text('address', null, ['class' => 'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::label('cellphone', 'Celular:') }}
        {{ Form::text('cellphone', null, ['class' => 'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::label('debt', 'Abono:') }}
        {{ Form::number('debt', null, ['class' => 'form-control', 'required' => 'required']) }}
    </div>

    <div class="form-group">
        {{ Form::label('debt_comment', 'Comentarios:') }}
        {{ Form::text('debt_comment', null, ['class' => 'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::label('image', 'Seleccionar una foto:') }}
        {{ Form::file('image', ['class' => 'form-control-file', 'required' => 'required']) }}
    </div>

    <a href="/Clients" class="btn btn-primary">Volver a la Lista de clientes</a>
    {{ Form::submit('Guardar', ['class' => 'btn btn-primary']) }}
{!! Form::close() !!}
