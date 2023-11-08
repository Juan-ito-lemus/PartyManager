<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Order extends Model
{
    use HasFactory;
    use Searchable;
    protected $fillable = [
        'cliente_id',
        'fecha_pedido',
        'fecha_entrega',
        'estado',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class, 'cliente_id');
        return $this->belongsTo(Client::class);
    }

}
