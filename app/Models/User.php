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
        'qtd_seguidores',
        'qtd_assinantes'
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

    // ------------------
    // MODEL CONFIGURATIONS
    // ------------------
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

    // ------------------
    // DATABASE RELATIONS
    // ------------------
    public function seguidos()
    {
        return $this->belongsToMany(User::class, 'seguidores', 'seguidor_id', 'seguido_id')
            ->withTimestamps();
    }

    // Relação de seguidores (quem me segue)
    public function seguidores()
    {
        return $this->belongsToMany(User::class, 'seguidores', 'seguido_id', 'seguidor_id')
            ->withTimestamps();
    }

    // Relação de assinaturas (criadores que EU assino)
    public function assinados()
    {
        return $this->belongsToMany(User::class, 'assinaturas', 'assinante_id', 'assinado_id')
            ->withPivot(['data_expiracao', 'ativa'])
            ->withTimestamps();
    }

    // Relação de assinantes (quem assina MEU conteúdo)
    public function assinantes()
    {
        return $this->belongsToMany(User::class, 'assinaturas', 'assinado_id', 'assinante_id')
            ->withPivot(['data_expiracao', 'ativa'])
            ->withTimestamps();
    }

    // ------------------
    // ACCESSORS AND MUTATORS
    // ------------------
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

    /**
     * Accessor para formatar qtd_assinantes
     */
    public function getQtdAssinantesFormatadoAttribute(): string
    {
        $assinantes = $this->qtd_assinantes;

        if ($assinantes >= 1000000) {
            return round($assinantes / 1000000, 1) . 'M';
        }

        if ($assinantes >= 1000) {
            return round($assinantes / 1000, 1) . 'K';
        }

        return (string) $assinantes;
    }

    // Helper: Verifica se um usuário específico me segue
    public function getSeguidoPorMimAttribute()
    {
        if (!auth()->check()) return false;

        return $this->seguidores()
            ->where('seguidor_id', auth()->id())
            ->exists();
    }

    // Helper: Verifica se um usuário é assinante do meu conteúdo
    public function getAssinadoPorMimAttribute()
    {
        if (!auth()->check()) return false;

        return $this->assinantes()
            ->where('assinante_id', auth()->id())
            ->where('ativa', true)
            ->where('data_expiracao', '>', now())
            ->exists();
    }
}
