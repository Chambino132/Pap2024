<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'utype',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password'          => 'hashed',
    ];

    function cliente(): HasOne
    {
        return $this->hasOne(Cliente::class);
    }

    function personal(): HasOne
    {
        return $this->hasOne(Personal::class);
    }

    function funcionario(): HasOne
    {
        return $this->hasOne(Funcionario::class);
    }

    function reclamacaos(): HasMany
    {
        return $this->hasMany(Reclamacao::class);
    }

    function mensagems(): HasMany
    {
        return $this->hasMany(Mensagem::class);
    }

    function chats(): BelongsToMany
    {
        return $this->belongsToMany(Chat::class);
    }
}
