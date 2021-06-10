<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class usuario extends Model
{
    protected $fillable = [
        'usu_nome', 'email', 'usu_cpf', 'telefone', 'email', 'senha'
    ];
}
