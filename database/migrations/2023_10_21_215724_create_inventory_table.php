<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('inventory', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id'); // Ejemplo de atributo en español
            $table->integer('cantidad_disponible');
            $table->string('estado');
            $table->timestamps();
        
            $table->foreign('product_id')->references('id')->on('products');
        // En la migración de Inventories
        Schema::table('inventories', function (Blueprint $table) {
            $table->integer('reserved_quantity')->default(0);
});

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventory');
    }
};
