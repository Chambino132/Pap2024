<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Personal extends Model
{
    use HasFactory;

    protected $fillable = [
        'dtNascimento',
        'telefone',
        'morada',
        'user_id',
        'atividade_id'
    ];

    function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    function marcacaos() : HasMany 
    {
        return $this->hasMany(Marcacao::class);    
    }

    function atividades(): BelongsToMany
    {
        return $this->belongsToMany(Atividade::class, AtividadePersonal::class);
    }
}
