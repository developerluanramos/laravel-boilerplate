<?php

namespace Database\Seeders;

use App\Models\Postagem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostagemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Postagem::factory(100)->create();
    }
}
