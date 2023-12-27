<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Problema extends Model
{
    use HasFactory;

    protected $fillable = [
        'problema',
        'equipamento_id',
        'estado',
    ];

    function equipamento(): BelongsTo {
        return $this->belongsTo(Equipamento::class);
    }
}
