<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;


class Product extends Model
{
    use HasFactory;
    use Searchable;

// Dentro de tu modelo Product
protected $fillable = ['name', 'description', 'fee', 'price', 'cost', 'image'];

    public function inventory()
    {
        return $this->hasMany(Inventory::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
    
}
