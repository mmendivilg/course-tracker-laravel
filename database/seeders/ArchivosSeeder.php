<?php

namespace Database\Seeders;

use App\Models\Archivo\Archivo;
use Illuminate\Database\Seeder;

class ArchivosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Archivo::query()->truncate();
        Archivo::create(
            [
                'id_empresa' => 1,
                'uuid' => uniqid( '', true ),
                'nombre' => "_a.png",
                'extension' => "png",
                'path' => "imagenes/_a.png",
            ]
        );
        Archivo::create(
            [
                'id_empresa' => 1,
                'uuid' => uniqid( '', true ),
                'nombre' => "_b.png",
                'extension' => "png",
                'path' => "imagenes/_b.png",
            ]
        );
    }
}
