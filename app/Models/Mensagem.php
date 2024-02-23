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
        'estado',
        'user_id',
        'chat_id',
    ];

    function chat(): BelongsTo
    {
        return $this->belongsTo(Chat::class);
    }

    function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}
