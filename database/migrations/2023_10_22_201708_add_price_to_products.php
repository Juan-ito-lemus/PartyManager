<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPriceToProducts extends Migration
{
// En la migración 2023_10_22_201708_add_price_to_products.php
// En la migración 2023_10_22_201708_add_price_to_products.php
public function up()
{
}



    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('price'); // Revierte la creación de la columna 'price'
        });
    }
}
