<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sobre extends Model
{
    use HasFactory;

    protected $fillable = [
        'desc_sobre',
        'competencia', // Será um array serializado
        'curso',       // Será um array serializado
        'link_curso',  // Será um array serializado
        'desc_curso',  // Será um array serializado
    ];

    protected $casts = [
        'competencia' => 'array',
        'curso' => 'array',
        'link_curso' => 'array',
        'desc_curso' => 'array',
    ];
}