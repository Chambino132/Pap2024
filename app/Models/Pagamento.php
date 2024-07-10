<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pagamento extends Model
{
    use HasFactory;

    protected $fillable = [
        'mes_pago',
        'data_pag',
    ];

    function cliente() : BelongsTo {
        return $this->belongsTo(Cliente::class);
    }

}
