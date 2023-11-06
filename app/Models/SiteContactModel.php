<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteContactModel extends Model
{
    use HasFactory;

    protected $table = 'site_contact_models';
    protected $fillable = [
        'nome',
        'telefone',
        'email',
        'motivo_contato',
        'mensagem'
    ];
}
