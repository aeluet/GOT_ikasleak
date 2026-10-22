<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Ordena garrantzitsua: gurasoak (kategoriak, erabiltzaileak) umeak (ekitaldiak, erosketak) baino lehen
        $this->call([
            KategoriaSeeder::class,
            ErabiltzaileSeeder::class,
            EkitaldiaSeeder::class,
            ErosketaSeeder::class,
        ]);
    }
}
