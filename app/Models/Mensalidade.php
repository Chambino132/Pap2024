<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Mensalidade extends Model
{
    use HasFactory;

    protected $fillable = [
        'preco',
        'dias',
    ];

    function clientes(): HasMany
    {
        return $this->hasMany(Cliente::class);
    }
}
