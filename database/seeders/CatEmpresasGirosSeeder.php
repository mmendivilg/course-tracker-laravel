<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ClienteEmpresa\EmpresaGiro;

class CatEmpresasGirosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        EmpresaGiro::query()->truncate();
        EmpresaGiro::create(
            [
                'id_empresa' => 1,
                'codigo' => "1000",
                'nombre' => "Producción general"
            ]
        );
        
        
        EmpresaGiro::create(
            [
                'id_empresa' => 1,
                'codigo' => "2000",
                'nombre' => "Servicios"
            ]
        );
        
        
        EmpresaGiro::create(
            [
                'id_empresa' => 1,
                'codigo' => "3000",
                'nombre' => "Administración, contabilidad y economía"
            ]
        );
        
        
        EmpresaGiro::create(
            [
                'id_empresa' => 1,
                'codigo' => "4000",
                'nombre' => "Comercialización"
            ]
        );
        
        
        EmpresaGiro::create(
            [
                'id_empresa' => 1,
                'codigo' => "5000",
                'nombre' => "Mantenimiento y reparación"
            ]
        );
        
        
        EmpresaGiro::create(
            [
                'id_empresa' => 1,
                'codigo' => "6000",
                'nombre' => "Seguridad"
            ]
        );
        
        
        EmpresaGiro::create(
            [
                'id_empresa' => 1,
                'codigo' => "7000",
                'nombre' => "Desarrollo personal y familiar"
            ]
        );
        
        
        EmpresaGiro::create(
            [
                'id_empresa' => 1,
                'codigo' => "8000",
                'nombre' => "Uso de tecnologías de la información y comunicación"
            ]
        );
        
        
        EmpresaGiro::create(
            [
                'id_empresa' => 1,
                'codigo' => "9000",
                'nombre' => "Participación Social"
            ]
        );        
    }
}
