<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ClienteEmpresa\ClienteEmpresa;

class ClientesEmpresasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ClienteEmpresa::query()->truncate();
        ClienteEmpresa::create(
            [
                'id_empresa' => 1,
                'nombre' => "Developer Minds Labs",
                'rfc' => "GOF1233312AA",
                'registro_imss' => "XXX13212312",
                'calle' => "Lorem Ipsum",
                'numero' => "",
                'codigo_postal' => "12345",
                'ciudad' => "Cd De Mx",
                'estado' => "DF",
                'pais' => "México",
                'contacto' => "Harvey Hopkinson / Gerente de Sistemas",
                'id_cat_empresa_giro' => 1,
            ]
        );
    }
}
