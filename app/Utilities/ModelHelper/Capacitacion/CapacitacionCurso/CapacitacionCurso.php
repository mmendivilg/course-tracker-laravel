<?php
namespace App\Utilities\ModelHelper\Capacitacion\CapacitacionCurso;

use App\Models\Capacitacion\Capacitador;
use App\Models\Capacitacion\Curso;
use App\Models\Capacitacion\Duracion;
use App\Utilities\FechaFormato;

class CapacitacionCurso
{
    public $id_curso;
    public $id_cat_duracion;
    public $curso;
    public $duracion;
    public $capacitador;
    public $capacitadores;
    public $id_capacitador;
    public $fechas;
    public $fecha;

    public function __construct ( $curso_datos ) {
        $this->id_curso = $curso_datos->id_curso;
        $this->id_cat_duracion = $curso_datos->id_cat_duracion ?? null;
        $this->id_capacitador = $curso_datos->id_capacitador ?? null;
        $this->curso = Curso::find($this->id_curso);
        $this->duracion = Duracion::find($this->id_cat_duracion);
        $this->capacitador = Capacitador::find($this->id_capacitador);
        $this->capacitadores = $curso_datos->capacitadores ?? [];
        $this->fecha = $curso_datos->fecha ?? null;
        $this->fechas = $curso_datos->fechas ?? [];
    }

    public function capacitadores(){
        return Capacitador::whereIn('id', $this->capacitadores)->get();
    }

    public function fechasOrdenadas(){
        $fechas = $this->fechas;
        usort($fechas, [FechaFormato::class, 'date_sort']);
        return $fechas;
    }
}