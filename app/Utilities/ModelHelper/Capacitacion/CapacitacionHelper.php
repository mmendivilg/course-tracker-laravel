<?php

namespace App\Utilities\ModelHelper\Capacitacion;

use App\Utilities\ModelHelper\Capacitacion\CapacitacionExcel;
use App\Models\Archivo\Archivo;
use Exception;
use App\Utilities\ModelHelper\Capacitacion\CapacitacionCurso\CapacitacionCursos;

trait CapacitacionHelper
{
    public function cursos()
    {
        $id_cursos = $this->trabajadores->map( function($trabajador, $key) {
            return $trabajador['id_cat_curso'];
        })
        ->unique()
        ->filter( function( $v, $k ) { return !empty($v); } )
        ->toArray();
        return \App\Models\Capacitacion\Curso::whereIn('id', $id_cursos)->get();
    }

    public function cursosFechas(){
        return new CapacitacionCursos( json_decode($this->cursos_fechas) );
    }

    public function cursosCapacitadores(){
        return new CapacitacionCursos( json_decode($this->cursos_capacitadores) );
    }

    public function porcentajeAprobados()
    {
        $total = $this->trabajadores->filter( function( $t, $k ) { return $t->id_cat_curso; } )->count();
        $aprobados = $this->aprobados()->filter( function( $t, $k ) { return $t->id_cat_curso; } )->count();
        if ( $total > 0 ) {
            return round( ( $aprobados / $total ) * 100, 0);
        } else {
            return 0;
        }
    }

    public function aprobados()
    {
        return $this->trabajadores->filter(function ($trabajador, $key) {
            return $trabajador->aprobado();
        });
    }

    public function reprobados()
    {
        return $this->trabajadores->filter(function ($trabajador, $key) {
            return $trabajador->reprobado();
        });
    }
}