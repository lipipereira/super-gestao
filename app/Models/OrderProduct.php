<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    use HasFactory;

    protected $table = 'pedidos_produtos';

    protected $fillable = [
        'produto_id',
        'pedido_id',
        'quantidade'
    ];
}
