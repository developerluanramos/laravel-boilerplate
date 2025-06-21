<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Postagem extends Model
{
    /** @use HasFactory<\Database\Factories\PostagemFactory> */
    use HasFactory;

    protected $table = 'postagens';

    protected $fillable = [
        'criador_id',
        'tipo_comercializacao',
        'legenda',
        'preco',
        'publico',
        'bloqueado',
        'qtd_visualizacoes',
        'qtd_curtidas'
    ];

    public function midias(): HasMany
    {
        return $this->hasMany(Midia::class)->orderBy('ordem');
    }

    public function criador()
    {
        return $this->belongsTo(User::class, 'criador_id');
    }

    /**
     * Accessor para created_at em formato humano
     * Ex: "há 2 dias", "há 1 semana"
     */
    public function getCreatedAtForHumansAttribute(): string
    {
        return $this->created_at->diffForHumans();
    }

    /**
     * Accessor para formatar qtd_seguidores
     */
    public function getQtdCurtidasFormatadaAttribute(): string
    {
        $curtidas = $this->qtd_curtidas;

        if ($curtidas >= 1000000) {
            return round($curtidas / 1000000, 1) . 'M';
        }

        if ($curtidas >= 1000) {
            return round($curtidas / 1000, 1) . 'K';
        }

        return (string) $curtidas;
    }

    /**
     * Accessor para formatar qtd_seguidores
     */
    public function getQtdVisualizacoesFormatadaAttribute(): string
    {
        $visualizacoes = $this->qtd_visualizacoes;

        if ($visualizacoes >= 1000000) {
            return round($visualizacoes / 1000000, 1) . 'M';
        }

        if ($visualizacoes >= 1000) {
            return round($visualizacoes / 1000, 1) . 'K';
        }

        return (string) $visualizacoes;
    }
}
