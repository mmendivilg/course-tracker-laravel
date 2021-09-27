<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Capacitacion\Curso;

class CatCursosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Curso::query()->truncate();
        Curso::create(
            [
                'id_empresa' => 1,
                'nombre' => "Introduction to Data Science"
            ]
        );
        Curso::create(
            [
                'id_empresa' => 1,
                'nombre' => "Data Science Fundamentals with Python and SQL"
            ]
        );
        Curso::create(
            [
                'id_empresa' => 1,
                'nombre' => "Machine Learning"
            ]
        );
        
    }
}
