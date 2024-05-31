<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Best extends Model
{
    use HasFactory;

    protected $fillable = [
        'equipamento_id',
        'pb',
        'cliente_id',
    ];


    public function equipamento() : BelongsTo 
    {
        return $this->belongsTo(Equipamento::class);
    }

    public function cliente(): BelongsTo
    {
        return $this->belongsTo(Cliente::class);
    }
}
