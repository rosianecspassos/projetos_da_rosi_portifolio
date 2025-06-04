<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Principal extends Model

{
    use HasFactory;
    protected $table = 'principais';
    protected $fillable=[
    'foto',
    'nome', 
    'cargo_atual',
    'titulo_academico',  
    'idioma',
    'formacao',
    'instituicao',
    'experiencia', 
    'grau',
    'areas',
    
    ];

        protected $casts = [
            'formacao' => 'array',
            'grau' => 'array',
            'instituicao' => 'array',
            'idioma' => 'array',
            'areas' => 'array',
            'experiencia' => 'array',
        ];
        
        public function getFormacoesCompletasAttribute()
        {
            // Decodifica se estiver como JSON em string
            $formacoes = is_string($this->formacao) ? json_decode($this->formacao, true) : $this->formacao;
            $graus = is_string($this->grau) ? json_decode($this->grau, true) : $this->grau;
            $instituicoes = is_string($this->instituicao) ? json_decode($this->instituicao, true) : $this->instituicao;
        
            // Garante que sejam arrays
            $formacoes = is_array($formacoes) ? $formacoes : [];
            $graus = is_array($graus) ? $graus : [];
            $instituicoes = is_array($instituicoes) ? $instituicoes : [];
        
            $completas = [];
        
            $count = max(count($formacoes), count($graus), count($instituicoes));
        
            for ($i = 0; $i < $count; $i++) {
                $completas[] = [
                    'formacao' => $formacoes[$i] ?? '',
                    'grau' => $graus[$i] ?? '',
                    'instituicao' => $instituicoes[$i] ?? '',
                ];
            }
        
            return $completas;
        }







}



