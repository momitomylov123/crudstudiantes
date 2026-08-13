<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Preceptor;

class PreceptorSeeder extends Seeder
{
    public function run(): void
    {
        Preceptor::create([
            'nombre' => 'Yuqi',
            'apellido' => 'Song',
        ]);

        Preceptor::create([
            'nombre' => 'Miyeon',
            'apellido' => 'Cho',
        ]);

        Preceptor::create([
            'nombre' => 'Minnie',
            'apellido' => 'Nicha',
        ]);
    }
}