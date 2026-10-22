<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class ErabiltzaileSeeder extends Seeder
{
    public function run(): void
    {
        $erabiltzaileak = [
            ['name' => 'Administratzailea', 'email' => 'admin@antzokia.test', 'role' => 'admin'],
            ['name' => 'Ane Etxeberria',    'email' => 'ane@antzokia.test',   'role' => 'user'],
            ['name' => 'Mikel Aranburu',    'email' => 'mikel@antzokia.test', 'role' => 'user'],
            ['name' => 'Leire Zubizarreta', 'email' => 'leire@antzokia.test', 'role' => 'user'],
        ];

        foreach ($erabiltzaileak as $e) {
            // forceCreate: 'rola' eta 'email_verified_at' $fillable-en ez badaude ere funtzionatzen du
            User::forceCreate($e + [
                'password' => Hash::make('password'), // garapenerako soilik
                'email_verified_at' => now(),
            ]);
        }
    }
}
