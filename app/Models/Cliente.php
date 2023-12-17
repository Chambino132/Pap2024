<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Cliente extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'mensalidade_id',
        'dtNascimento',
        'NIF',
        'telefone',
        'morada',
        'user_id',
    ];


    function marcacoes() : HasMany 
    {
        return $this->hasMany(Marcacoes::class);    
    }

    function mensalidade() : BelongsTo 
    {
        return $this->belongsTo(Mensalidade::class);
    }

    function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    function presencas(): HasMany
    {
       return $this->hasMany(Presenca::class);
    } 

}
