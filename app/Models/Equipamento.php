<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Equipamento extends Model
{
    use HasFactory;

    protected $fillable = [
        'dtAquisicao',
        'preco',
        'equipamento',
    ];

    public function problemas(): HasMany 
    {
        return $this->hasMany(Problema::class);
    }

    public function bests(): HasMany 
    {
        return $this->hasMany(Best::class);    
    }

}
