<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Filme extends Model
{
    protected $fillable = [
        'titulo',
        'duracao',
        'descricao',
        'produtora',
        'anoLancamento',
        'poster'
    ];

    public $timestamps = false;

    
}
