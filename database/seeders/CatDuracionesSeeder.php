<?php

namespace Database\Seeders;

use App\Models\Capacitacion\Duracion;
use Illuminate\Database\Seeder;

class CatDuracionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Duracion::query()->truncate();
        Duracion::create(
            [
                'id_empresa' => 1,
                'horas' => 2,
                'nombre' => "2  Horas. Matutino (11:00 a 13:00 hrs) y Vespertino (14:00 a 16:00)"
            ]
        );

        Duracion::create(
            [
                'id_empresa' => 1,
                'horas' => 3,
                'nombre' => "3  Horas. Vespertino"
            ]
        );

        Duracion::create(
            [
                'id_empresa' => 1,
                'horas' => 4,
                'nombre' => "4  Horas. Matutino"
            ]
        );
        
    }
}
