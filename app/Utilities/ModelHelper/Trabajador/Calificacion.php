<?php

namespace App\Utilities\ModelHelper\Trabajador;

use App\Utilities\ModelHelper\Capacitacion\CapacitacionExcel;
use App\Models\Archivo\Archivo;
use Exception;

trait Calificacion
{
    protected $calificacion_minima = 80;
    protected $estado_apto = 'A';
    protected $estado_no_apto = 'NA';
    protected $estado_no_disponible = 'ND';
    
    public function aprobado()
    {
        return $this->calificacion() >= $this->calificacion_minima;
    }

    public function reprobado()
    {
        return !$this->aprobado();
    }
    
    public function calificacion()
    {
        if( $this->preguntas ){
            return round( ( $this->aciertos / $this->preguntas ) * 100, 0 );
        }
        return 0;
    }

    public function calificacion_estado()
    {
        if( !$this->calificacion() ){
            return $this->estado_no_disponible;
        }

        if( $this->aprobado() ) {
            return $this->estado_apto;
        }

        if( $this->reprobado() ) {
            return $this->estado_no_apto;
        }
    }
}