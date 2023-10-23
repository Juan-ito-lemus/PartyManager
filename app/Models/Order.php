<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'cliente_id',
        'fecha_pedido',
        'fecha_entrega',
        'estado',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class, 'cliente_id');
    }
}
