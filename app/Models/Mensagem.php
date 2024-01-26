<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Mensagem extends Model
{
    use HasFactory;

    protected $fillable = [
        'mensagem',
        'chat_id',
    ];

    function chat(): BelongsTo
    {
        return $this->belongsTo(Chat::class);
    }

}
