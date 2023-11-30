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

<!-- Contenedor para productos -->
<div id="productos-container">
    <!-- Plantilla para productos -->
    <div class="form-group producto-item">
        <div class="row">
            <div class="col-md-6">
                {{ Form::label('product_id', 'producto') }}
                {{ Form::select('product_id', $products->pluck('name', 'id'), null, ['class' => 'form-control', 'placeholder' => 'Seleccione un producto']) }}
            </div>
            <div class="col-md-5">
                {{ Form::label('quantity', 'Cantidad') }}
                {{ Form::number('quantity', null, ['class' => 'form-control', 'placeholder' => 'Cantidad']) }}
            </div>
            <div class="col-md-1">
                <button type="button" class="btn btn-danger" onclick="eliminarProducto(this)">Eliminar</button>
            </div>
        </div>
    </div>
</div>

<!-- Botón para agregar más productos -->
<button type="button" class="btn btn-primary" onclick="agregarProducto()">Agregar Producto</button>

<a href="/orders" class="btn btn-primary">Volver a la Lista de Pedidos</a>
{{ Form::submit('Crear Orden', ['class' => 'btn btn-primary']) }}
{!! Form::close() !!}

<script>
    function agregarProducto() {
        var productosContainer = document.getElementById('productos-container');
        var plantilla = document.querySelector('.producto-item');
        var nuevoProductoItem = plantilla.cloneNode(true);
        nuevoProductoItem.style.display = 'block';
        productosContainer.appendChild(nuevoProductoItem);
    }

    function eliminarProducto(botonEliminar) {
        var productoItem = botonEliminar.closest('.producto-item');
        productoItem.remove();
    }
</script>
