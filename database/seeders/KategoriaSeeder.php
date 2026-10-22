<?php

namespace Database\Seeders;

use App\Models\Kategoria;
use Illuminate\Database\Seeder;

class KategoriaSeeder extends Seeder
{
    public function run(): void
    {
        foreach (['Antzerkia', 'Musika', 'Dantza', 'Haur ikuskizunak', 'Zinema'] as $izena) {
            Kategoria::create(['izena' => $izena]);
        }
    }
}
