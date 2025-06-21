<?php

namespace Database\Factories;

use App\Enums\TipoMidiaEnum;
use App\Models\Postagem;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Midia>
 */
class MidiaFactory extends Factory
{
    public function definition()
    {
        $tipo = $this->faker->randomElement(TipoMidiaEnum::cases());
        return [
            'postagem_id' => Postagem::inRandomOrder()->first()->id,
            'tipo' => $tipo,
            'url' => $this->generateUrl($tipo),
            'thumbnail_url' => $tipo === TipoMidiaEnum::video
                ? 'https://source.unsplash.com/random/300x300/?thumbnail&' . $this->faker->unique()->word
                : null,
            'duracao' => $tipo !== TipoMidiaEnum::imagem
                ? $this->faker->numberBetween(15, 600)
                : null,
            'ordem' => $this->faker->numberBetween(1, 10),
        ];
    }

    private function generateUrl($tipo): string
    {
        return match ($tipo) {
            TipoMidiaEnum::imagem => 'https://source.unsplash.com/random/800x600/?photo&' . $this->faker->unique()->word,
            TipoMidiaEnum::video => 'https://commondatastorage.googleapis.com/gtv-videos-bucket/sample/BigBuckBunny.mp4',
            TipoMidiaEnum::audio => 'https://www.soundhelix.com/examples/mp3/SoundHelix-Song-1.mp3',
            default => throw new \Exception('Unexpected match value'),
        };
    }
}
