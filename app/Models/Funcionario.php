<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Funcionario extends Model
{
    use HasFactory;

    protected $fillable = [
        'telefone',
        'morada',
        'user_id',
        'cargo',
        'foto',
    ];

    function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
