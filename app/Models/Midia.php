<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Midia extends Model
{
    /** @use HasFactory<\Database\Factories\MidiaFactory> */
    use HasFactory;

    protected $fillable = [
        'postagem_id',
        'tipo',
        'url',
        'thumbnail_url',
        'duracao',
        'ordem'
    ];

    public function postagem(): BelongsTo
    {
        return $this->belongsTo(Postagem::class);
    }
}
