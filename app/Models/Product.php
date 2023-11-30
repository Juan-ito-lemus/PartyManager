<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;


class Product extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'nombre',
        'descripcion',
        'precio',
        'cantidad_disponible', // Agrega este campo
    ];
    public function inventory()
    {
        return $this->hasMany(Inventory::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
    
}
