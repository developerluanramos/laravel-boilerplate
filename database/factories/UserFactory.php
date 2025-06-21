<?php

namespace Database\Factories;

use App\Enums\ProfilesEnum;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->email(),
            'nickname' => $this->generateNickname(),
            'avatar_url' => $this->generateAvatarUrl(),
            'email_verified_at' => now(),
            'password' => Hash::make('secret'),
            'remember_token' => Str::random(10),
            'role' => ProfilesEnum::admin,
            'qtd_seguidores' => random_int(10, 10000000),
            'qtd_assinantes' => random_int(10, 10000000)
        ];
    }

    /**
     * Gera um nickname único com @
     */
    private function generateNickname(): string
    {
        $username = fake()->userName(); // Gera algo como "johndoe123"
        $nickname = '@' . Str::slug($username, ''); // Remove hífens e adiciona @

        return Str::limit($nickname, 20, ''); // Limita o tamanho (opcional)
    }

    private function generateAvatarUrl(): string
    {
        $services = [
            'https://i.pravatar.cc/300?u=',  // Pravatar
//            'https://api.dicebear.com/7.x/identicon/svg?seed=',  // DiceBear
//            'https://robohash.org/',  // Robohash
//            'https://source.boringavatars.com/beam/120/'  // Boring Avatars
        ];

        $service = fake()->randomElement($services);
        $uniqueId = fake()->unique()->word;

        return $service . $uniqueId;
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
