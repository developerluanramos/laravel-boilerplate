<?php

namespace Database\Seeders;

use App\Models\Midia;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MidiaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Midia::factory(200)->create();
    }
}
