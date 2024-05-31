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
        'descricao',
        'arquivado',
        'funcionario_id'
    ];
    
    function funcionario(): BelongsTo
    {
        return $this->belongsTo(Funcionario::class);
    }
}
