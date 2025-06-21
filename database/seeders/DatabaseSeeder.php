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
        ]);

        $this->call(
            [
                PostagemSeeder::class,
                MidiaSeeder::class
            ]
        );
    }
}
