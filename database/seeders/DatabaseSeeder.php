<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(ArchivosSeeder::class);
        $this->call(CatAreasSubareasOcupacionesSeeder::class);
        $this->call(CatEmpresasGirosSeeder::class);
        $this->call(CatPuestosSeeder::class);
        $this->call(CatDepartamentosSeeder::class);
        $this->call(CatCursosSeeder::class);
        $this->call(CapacitadorSeeder::class);
        $this->call(CatTiposCapacitacionesSeeder::class);
        $this->call(ClientesEmpresasSeeder::class);
        $this->call(CatDuracionesSeeder::class);
        $this->call(CapacitacionesSeeder::class);
        $this->call(TrabajadoresSeeder::class);
        $this->call(EmpresaSeeder::class);
    }
}
