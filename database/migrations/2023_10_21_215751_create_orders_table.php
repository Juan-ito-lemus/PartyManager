<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cliente_id'); // Clave foránea relacionada con la tabla de Clientes
            $table->foreign('cliente_id')->references('id')->on('clients');
            $table->date('fecha_pedido');
            $table->date('fecha_entrega')->nullable();
            $table->string('estado'); // Estado del pedido
            $table->timestamps(); // Campos de fecha de creación y actualización
        });
    }

    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
