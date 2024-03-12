<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\{BelongsTo, HasMany, HasOne};

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = [
        'mensalidade_id',
        'dtNascimento',
        'NIF',
        'telefone',
        'Morada',
        'user_id',
        'ultMes',
    ];

    public function marcacaos(): HasMany
    {
        return $this->hasMany(Marcacao::class);
    }

    public function mensalidade(): BelongsTo
    {
        return $this->belongsTo(Mensalidade::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function presencas(): HasMany
    {
        return $this->hasMany(Presenca::class);
    }

    public function pagamentos(): HasMany
    {
        return $this->hasMany(Pagamento::class);
    }
    
    public function planos(): BelongsToMany
    {
        return $this->belongsToMany(Plano::class);
    }

}
