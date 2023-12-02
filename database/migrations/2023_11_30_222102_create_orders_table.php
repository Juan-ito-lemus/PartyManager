<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cliente_id');
            $table->date('fecha_pedido');
            $table->date('fecha_entrega');
            $table->string('estado', 255);
            $table->timestamps(0);
            $table->unsignedInteger('product_id')->nullable();
            $table->unsignedInteger('quantity')->nullable();

            $table->foreign('cliente_id')
                ->references('id')->on('clients')
                ->onUpdate('NO ACTION')
                ->onDelete('NO ACTION');

            $table->foreign('product_id')
                ->references('id')->on('products')
                ->onUpdate('NO ACTION')
                ->onDelete('NO ACTION');

            $table->index(['cliente_id', 'product_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
