<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Presenca extends Model
{
    use HasFactory;

    protected $fillable = [
        'cliente_id',
        'dia',
        'hora',
    ];

    function cliente(): BelongsTo
    {
        return $this->belongsTo(Cliente::class);
    }

}
