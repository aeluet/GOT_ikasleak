<?php

namespace Database\Seeders;

use App\Models\Ekitaldia;
use App\Models\Kategoria;
use Illuminate\Database\Seeder;

class EkitaldiaSeeder extends Seeder
{
    public function run(): void
    {
        $ekitaldiak = [
            // [kategoria, izenburua, deskribapena, data, aretoa, prezioa, edukiera]
            ['Antzerkia', 'Hamlet euskaraz', 'Shakespeareren klasikoaren egokitzapen berria.', now()->addDays(10)->setTime(20, 0), 'Areto nagusia', 18.00, 300],
            ['Antzerkia', 'Antzerki esperimentala', 'Ikuskizun intimista, 10 ikusle bakarrentzat.', now()->addDays(15)->setTime(19, 30), 'Areto txikia', 12.00, 10],
            ['Musika', 'Kontzertu akustikoa', 'Bertsolari eta musikarien arteko gaua.', now()->addDays(20)->setTime(21, 0), 'Areto nagusia', 15.00, 300],
            ['Musika', 'Jazz gaua', 'Jazz laukotea zuzenean.', now()->addDays(35)->setTime(21, 30), 'Areto txikia', 20.00, 120],
            ['Dantza', 'Dantza garaikidea', 'Konpainia bisitariaren ikuskizun berria.', now()->addDays(30)->setTime(20, 0), 'Areto nagusia', 16.50, 300],
            ['Haur ikuskizunak', 'Txotxongiloen eguna', 'Familia osoarentzako ikuskizuna.', now()->addDays(12)->setTime(17, 0), 'Areto txikia', 6.00, 120],
            ['Zinema', 'Euskal zinema zikloa', 'Film laburren emanaldia eta solasaldia.', now()->addDays(25)->setTime(19, 0), 'Areto txikia', 5.00, 120],
            // Iraganeko ekitaldia: scopeHurrengoak probatzeko (ez da agertu behar)
            ['Musika', 'Udazkeneko kontzertua', 'Dagoeneko amaitutako ekitaldia.', now()->subDays(10)->setTime(20, 0), 'Areto nagusia', 14.00, 300],
        ];

        foreach ($ekitaldiak as [$kategoria, $izenburua, $deskribapena, $data, $aretoa, $prezioa, $edukiera]) {
            Ekitaldia::create([
                'kategoria_id' => Kategoria::where('izena', $kategoria)->firstOrFail()->id,
                'izenburua'    => $izenburua,
                'deskribapena' => $deskribapena,
                'data'         => $data,
                'aretoa'       => $aretoa,
                'prezioa'      => $prezioa,
                'edukiera'     => $edukiera,
            ]);
        }
        Ekitaldia::all()->each(fn($e) => collect(range(1,12))->each(fn() => $e->replicate()->save()));
    }
}
