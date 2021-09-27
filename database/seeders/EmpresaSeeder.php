<?php

namespace Database\Seeders;

use App\Models\Empresa\Empresa;
use Illuminate\Database\Seeder;

class EmpresaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Empresa::query()->truncate();
        Empresa::create(
            [
                'nombre' => "Course Tracker",
            ]
        );
    }
}
