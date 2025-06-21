<?php

namespace Database\Factories;

use App\Enums\ProfilesEnum;
use App\Enums\TipoComercializacaoEnum;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Postagem>
 */
class PostagemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Tipos de comercialização possíveis
        $tipoSelecionado = $this->faker->randomElement(TipoComercializacaoEnum::cases());

        return [
            'criador_id' => User::where('role', ProfilesEnum::criador)->inRandomOrder()->first()->id,
            'tipo_comercializacao' => $tipoSelecionado,
            'legenda' => $this->faker->sentence(35),
            'preco' => $tipoSelecionado === TipoComercializacaoEnum::avulso
                ? $this->faker->randomFloat(2, 5, 100)
                : null,
            'publico' => $this->faker->boolean(50), // 50% de chance de ser público
            'bloqueado' => $this->faker->boolean(2), // 2% de chance de estar bloqueado
            'qtd_visualizacoes' => $this->faker->numberBetween(100000, 50000000),
            'qtd_curtidas' => function (array $attributes) {
                // Curtidas proporcional às visualizações (10-30%)
                return $this->faker->numberBetween(
                    (int) ($attributes['qtd_visualizacoes'] * 0.1),
                    (int) ($attributes['qtd_visualizacoes'] * 0.3)
                );
            },
        ];
    }
}
