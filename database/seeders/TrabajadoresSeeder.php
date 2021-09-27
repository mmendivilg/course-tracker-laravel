<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Trabajador\Trabajador;

class TrabajadoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Trabajador::query()->truncate();
        Trabajador::create(
            [
                'id_empresa' => 1,
                'id_capacitacion' => 1,
                'id_cat_curso' => 1,
                'nombres' => "Jose Alejandro",
                'apellidos' => "Hernandez",
                'numero_colaborador' => "253",
                'id_cat_departamento' => 1,
                'id_cat_puesto' => 2,
                'id_cat_sub_area_ocupacion' => 3,
                'aciertos' => "9",
                'preguntas' => "10",
                'observaciones' => "",
                'rfc' => "XAXX010101000",
            ]
        );
        Trabajador::create(
            [
                'id_empresa' => 1,
                'id_capacitacion' => 1,
                'id_cat_curso' => 2,
                'nombres' => "Alexi",
                'apellidos' => "Tejeda Salgado",
                'numero_colaborador' => "400",
                'id_cat_departamento' => 1,
                'id_cat_puesto' => 3,
                'id_cat_sub_area_ocupacion' => 7,
                'aciertos' => "10",
                'preguntas' => "10",
                'observaciones' => "Obs",
                'rfc' => "XAXX010101000",
            ]
        );
        Trabajador::create(
            [
                'id_empresa' => 1,
                'id_capacitacion' => 1,
                'id_cat_curso' => 3,
                'nombres' => "Araceli",
                'apellidos' => "Carreón Muñoz",
                'numero_colaborador' => "581",
                'id_cat_departamento' => 1,
                'id_cat_puesto' => 1,
                'id_cat_sub_area_ocupacion' => 4,
                'aciertos' => "10",
                'preguntas' => "10",
                'observaciones' => "",
                'rfc' => "XAXX010101000",
            ]
        );
        Trabajador::create(
            [
                'id_empresa' => 1,
                'id_capacitacion' => 1,
                'id_cat_curso' => 1,
                'nombres' => "Fidela",
                'apellidos' => "Carreón Muñoz",
                'numero_colaborador' => "581",
                'id_cat_departamento' => 1,
                'id_cat_puesto' => 1,
                'id_cat_sub_area_ocupacion' => 4,
                'aciertos' => "10",
                'preguntas' => "10",
                'observaciones' => "",
                'rfc' => "XAXX010101000",
            ]
        );
        Trabajador::create(
            [
                'id_empresa' => 1,
                'id_capacitacion' => 1,
                'id_cat_curso' => 2,
                'nombres' => "José Ángel",
                'apellidos' => "Carreón Muñoz",
                'numero_colaborador' => "581",
                'id_cat_departamento' => 1,
                'id_cat_puesto' => 1,
                'id_cat_sub_area_ocupacion' => 4,
                'aciertos' => "10",
                'preguntas' => "10",
                'observaciones' => "",
                'rfc' => "XAXX010101000",
            ]
        );
        Trabajador::create(
            [
                'id_empresa' => 1,
                'id_capacitacion' => 1,
                // 'id_cat_curso' => 3,
                'nombres' => "Tatiana",
                'apellidos' => "Carreón Muñoz",
                'numero_colaborador' => "581",
                'id_cat_departamento' => 1,
                'id_cat_puesto' => 1,
                'id_cat_sub_area_ocupacion' => 4,
                'aciertos' => "10",
                'preguntas' => "10",
                'observaciones' => "",
                'rfc' => "XAXX010101000",
            ]
        );
        Trabajador::create(
            [
                'id_empresa' => 1,
                'id_capacitacion' => 1,
                'id_cat_curso' => 1,
                'nombres' => "Fernanda Viviana",
                'apellidos' => "Carreón Muñoz",
                // 'numero_colaborador' => "581",
                'id_cat_departamento' => 1,
                'id_cat_puesto' => 1,
                'id_cat_sub_area_ocupacion' => 4,
                'aciertos' => "10",
                'preguntas' => "10",
                'observaciones' => "",
                'rfc' => "XAXX010101000",
            ]
        );
        Trabajador::create(
            [
                'id_empresa' => 1,
                'id_capacitacion' => 1,
                'id_cat_curso' => 2,
                'nombres' => "Alma",
                'apellidos' => "Carreón Muñoz",
                'numero_colaborador' => "581",
                // 'id_cat_departamento' => 1,
                'id_cat_puesto' => 1,
                'id_cat_sub_area_ocupacion' => 4,
                'aciertos' => "10",
                'preguntas' => "10",
                'observaciones' => "",
                'rfc' => "XAXX010101000",
            ]
        );
        Trabajador::create(
            [
                'id_empresa' => 1,
                'id_capacitacion' => 1,
                'id_cat_curso' => 3,
                'nombres' => "Ximena Adelina",
                'apellidos' => "Carreón",
                'numero_colaborador' => "581",
                'id_cat_departamento' => 1,
                // 'id_cat_puesto' => 1,
                'id_cat_sub_area_ocupacion' => 4,
                'aciertos' => "10",
                'preguntas' => "10",
                'observaciones' => "",
                'rfc' => "XAXX010101000",
            ]
        );
        Trabajador::create(
            [
                'id_empresa' => 1,
                'id_capacitacion' => 1,
                'id_cat_curso' => 1,
                'nombres' => "Apolonia",
                'apellidos' => "Carreón Muñoz",
                'numero_colaborador' => "581",
                'id_cat_departamento' => 1,
                'id_cat_puesto' => 1,
                // 'id_cat_sub_area_ocupacion' => 4,
                'aciertos' => "10",
                'preguntas' => "10",
                'observaciones' => "",
                'rfc' => "XAXX010101000",
            ]
        );
        Trabajador::create(
            [
                'id_empresa' => 1,
                'id_capacitacion' => 1,
                'id_cat_curso' => 2,
                'nombres' => "Modesta",
                'apellidos' => "Carreón Muñoz",
                'numero_colaborador' => "581",
                'id_cat_departamento' => 1,
                'id_cat_puesto' => 1,
                'id_cat_sub_area_ocupacion' => 4,
                // 'aciertos' => "10",
                'preguntas' => "10",
                'observaciones' => "",
                'rfc' => "XAXX010101000",
            ]
        );
        Trabajador::create(
            [
                'id_empresa' => 1,
                'id_capacitacion' => 1,
                'id_cat_curso' => 3,
                'nombres' => "Graciana",
                'apellidos' => "Carreón Muñoz",
                'numero_colaborador' => "581",
                'id_cat_departamento' => 1,
                'id_cat_puesto' => 1,
                'id_cat_sub_area_ocupacion' => 4,
                'aciertos' => "10",
                // 'preguntas' => "10",
                'observaciones' => "",
                'rfc' => "XAXX010101000",
            ]
        );
    }
}
