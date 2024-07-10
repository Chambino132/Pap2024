<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Atividade extends Model
{
    use HasFactory;

    protected $fillable = [
        'atividade',
    ];

    function personals(): BelongsToMany 
    {
        return $this->BelongsToMany(Personal::class, AtividadePersonal::class);
    }
}
