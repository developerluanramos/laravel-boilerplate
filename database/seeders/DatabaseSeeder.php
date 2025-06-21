<?php

namespace Database\Seeders;

use App\Enums\ProfilesEnum;
use App\Models\Invitation;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
        ]);

        User::factory(50)->create([
            'role' => ProfilesEnum::criador,
        ])->each(function ($user) {
            // Seguidores
            $user->seguidores()->syncWithoutDetaching(
                User::where('id', '!=', $user->id)
                    ->inRandomOrder()
                    ->limit(rand(0, 10))
                    ->pluck('id')
            );

            // Criar 2 assinaturas ativas
            $user->assinados()->syncWithoutDetaching(
                User::where('id', '!=', $user->id)
                    ->inRandomOrder()
                    ->limit(2)
                    ->pluck('id'),
                [
                    'data_expiracao' => now()->addMonth(),
                    'ativa' => true
                ]
            );

            // Assinaturas inativas (para testes)
            $user->assinantes()->syncWithoutDetaching(
                User::where('id', '!=', $user->id)
                    ->inRandomOrder()
                    ->limit(rand(0, 5))
                    ->pluck('id'),
                [
                    'data_expiracao' => now()->subDays(rand(1, 30)),
                    'ativa' => false
                ]
            );
        });

        $this->call(
            [
                PostagemSeeder::class,
                MidiaSeeder::class
            ]
        );
    }
}
