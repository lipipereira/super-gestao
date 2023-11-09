<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SupplierModel extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'fornecedores';

    protected $fillable = [
        'nome',
        'site',
        'uf',
        'email'
    ];

    public function products()
    {
        return $this->hasMany('App\Models\Item', 'fornecedor_id', 'id');
    }
}
