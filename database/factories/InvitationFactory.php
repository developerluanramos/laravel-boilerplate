<?php

namespace Database\Factories;

use App\Enums\ProfilesEnum;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Invitation>
 */
class InvitationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'email' => fake()->unique()->email,
            'token' => Str::uuid(),
            'role' => fake()->randomElement(array_column(ProfilesEnum::cases(), 'value')),
            'expires_at' => Carbon::now()->addDay()
        ];
    }
}
