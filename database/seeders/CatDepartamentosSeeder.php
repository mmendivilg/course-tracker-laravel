<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Trabajador\Departamento;

class CatDepartamentosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Departamento::query()->truncate();
        Departamento::create(
            [
                'id_empresa' => 1,
                'nombre' => "Developers"
            ]
        );
    }
}
