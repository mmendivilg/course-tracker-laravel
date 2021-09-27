<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Capacitacion\Capacitador;

class CapacitadorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Capacitador::query()->truncate();
        Capacitador::create(
            [
                'id_empresa' => 1,
                'titulo' => "MC MVZ",
                'nombres' => "Tony",
                'apellidos' => "Wigley",
                'registro_stps' => "GOPC1111111-0001",
                'id_firma' => 1
            ]
        );
        Capacitador::create(
            [
                'id_empresa' => 1,
                'titulo' => "",
                'nombres' => "Joyce",
                'apellidos' => "Cox",
                'registro_stps' => "GOF3333333333",
                'id_firma' => 2
            ]
        );
    }
}
