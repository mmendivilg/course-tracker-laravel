<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Capacitacion\Capacitacion;

class CapacitacionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Capacitacion::query()->truncate();
        Capacitacion::create(
            [
                'id_empresa' => 1,
                'fecha' => "2020-01-03 15:18:06",
                'capacitadores' => json_encode(
                    [2]
                ),
                'cursos_fechas' => json_encode([
                    [
                        'id_curso' => 1,
                        'id_cat_duracion' => 1,
                        'fechas' => [ '2020-02-01', '2020-02-05' ],
                        'capacitadores' => [1,2]
                    ],
                    [
                        'id_curso' => 2,
                        'id_cat_duracion' => 2,
                        'fechas' => [ '2020-03-01', '2020-03-05' ],
                        'capacitadores' => [1]
                    ],
                    [
                        'id_curso' => 3,
                        'id_cat_duracion' => 3,
                        'fechas' => [ '2020-04-01', '2020-04-05' ],
                        'capacitadores' => [2]
                    ]
                ]),
                'cursos_capacitadores' => json_encode([
                    [
                        'id_curso' => 1,
                        'id_cat_duracion' => 1,
                        'fecha' => '2020-03-04',
                        'id_capacitador' => 1
                    ],
                    [
                        'id_curso' => 2,
                        'id_cat_duracion' => 2,
                        'fecha' => '2020-04-03',
                        'id_capacitador' => 2
                    ],
                    [
                        'id_curso' => 3,
                        'id_cat_duracion' => 3,
                        'fecha' => '2020-05-02',
                        'id_capacitador' => 1
                    ]
                ]),
                'id_cat_tipo_capacitacion' => 1,
                'id_cat_duracion' => 1,
                'id_cliente_empresa' => 1
            ]
        );
    }
}
