<?php

namespace Database\Seeders;

use App\Models\Ekitaldia;
use App\Models\Erosketa;
use App\Models\User;
use Illuminate\Database\Seeder;

class ErosketaSeeder extends Seeder
{
    public function run(): void
    {
        $erosketak = [
            // [erabiltzailearen emaila, ekitaldiaren izenburua, kantitatea]
            ['ane@antzokia.test',   'Hamlet euskaraz',        2],
            ['mikel@antzokia.test', 'Hamlet euskaraz',        4],
            ['leire@antzokia.test', 'Kontzertu akustikoa',    3],
            ['ane@antzokia.test',   'Txotxongiloen eguna',    4],
            ['mikel@antzokia.test', 'Jazz gaua',              2],
            ['leire@antzokia.test', 'Euskal zinema zikloa',   1],
            // Antzerki esperimentala: edukiera 10, guztiz saldua (4 + 3 + 3)
            ['ane@antzokia.test',   'Antzerki esperimentala', 4],
            ['mikel@antzokia.test', 'Antzerki esperimentala', 3],
            ['leire@antzokia.test', 'Antzerki esperimentala', 3],
        ];

        foreach ($erosketak as [$emaila, $izenburua, $kantitatea]) {
            $ekitaldia = Ekitaldia::where('izenburua', $izenburua)->firstOrFail();

            Erosketa::create([
                'erabiltzailea_id'      => User::where('email', $emaila)->firstOrFail()->id,
                'ekitaldia_id' => $ekitaldia->id,
                'kantitatea'   => $kantitatea,
                'guztira'      => $kantitatea * $ekitaldia->prezioa,
            ]);
        }
    }
}
