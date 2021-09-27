<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Trabajador\Puesto;

class CatPuestosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Puesto::query()->truncate();
        Puesto::create(
            [
                'id_empresa' => 1,
                'nombre' => "Jr Developer"
            ]
        );
        Puesto::create(
            [
                'id_empresa' => 1,
                'nombre' => "Senior Developer"
            ]
        );
        Puesto::create(
            [
                'id_empresa' => 1,
                'nombre' => "Database Administrator"
            ]
        );
    }
}
