<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Atividade extends Model
{
    use HasFactory;

    protected $fillable = [
        'atividade',
    ];

    function personals(): HasMany 
    {
        return $this->hasMany(AtividadePersonal::class);
    }
}
