<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Nota extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'descrição',
        'arquivado'
    ];
    
    function funcionario(): BelongsTo
    {
        return $this->belongsTo(Funcionario::class);
    }
}
