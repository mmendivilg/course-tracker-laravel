<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Capacitacion\TipoCapacitacion;

class CatTiposCapacitacionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TipoCapacitacion::query()->truncate();
        TipoCapacitacion::create(
            [
                'id_empresa' => 1,
                'id' => 1,
                'nombre' => "En Aula"
            ]
        );
        TipoCapacitacion::create(
            [
                'id_empresa' => 1,
                'id' => 2,
                'nombre' => "In Situ"
            ]
        );
    }
}
