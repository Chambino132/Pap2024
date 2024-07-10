<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Plano extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'descricao',
        'preco',
    ];

    public function exercicios(): BelongsToMany
    {
        return $this->belongsToMany(Exercicio::class)->withPivot('repeticoes');
    }

    public function clientes(): BelongsToMany
    {
        return $this->belongsToMany(Cliente::class);
    }
}
