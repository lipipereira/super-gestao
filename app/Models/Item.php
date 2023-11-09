<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\CssSelector\Node\FunctionNode;

class Item extends Model
{
    use HasFactory;

    protected $table = 'produtos';

    protected $fillable = [
        'nome',
        'descricao',
        'peso',
        'unidade_id',
        'fornecedor_id'
    ];

    public function productDetail()
    {
        return $this->hasOne('App\Models\ItemDetail', 'produto_id', 'id');
    }

    public function supplier()
    {
        return $this->belongsTo('App\Models\SupplierModel', 'fornecedor_id', 'id');
    }

    public function order()
    {
        return $this->belongsToMany('App\Models\Order', 'pedidos_produtos', 'produto_id', 'pedido_id');
    }
}
