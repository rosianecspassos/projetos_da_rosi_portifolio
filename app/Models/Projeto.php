<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Projeto extends Model
{
    protected $table = 'projetos';
    protected $fillable=[
    'imagem',
    'nome_projeto', 
    'link', 
    'descricao',

    ];



}
