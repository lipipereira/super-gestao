<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogAcess extends Model
{
    use HasFactory;
    protected $table = 'log_acessos';

    protected $fillable = [
        'log'
    ];
}
