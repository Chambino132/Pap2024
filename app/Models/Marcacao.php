<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Marcacao extends Model
{
    use HasFactory;

    protected $fillable = [
        'dia',
        'hora',
        'cliente_id',
        'personal_id',
        'estado',
    ];

    public function cliente(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function atividadePersonal(): BelongsTo
    {
        return $this->belongsTo(AtividadePersonal::class);
    }

    
}
