<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Enums\ProfilesEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'nickname',
        'avatar_url',
        'email',
        'password',
        'role',
        'qtd_seguidores'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Opcional: Valor padrão
    protected $attributes = [
        'avatar_url' => 'https://i.pravatar.cc/300?u=default',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'role' => ProfilesEnum::class
        ];
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function ($user) {
            $user->nickname = Str::start($user->nickname, '@');
        });
    }

    /**
     * Accessor para formatar qtd_seguidores
     */
    public function getQtdSeguidoresFormatadoAttribute(): string
    {
        $seguidores = $this->qtd_seguidores;

        if ($seguidores >= 1000000) {
            return round($seguidores / 1000000, 1) . 'M';
        }

        if ($seguidores >= 1000) {
            return round($seguidores / 1000, 1) . 'K';
        }

        return (string) $seguidores;
    }
}
