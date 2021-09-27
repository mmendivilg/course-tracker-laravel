<?php

namespace App\Utilities\ModelHelper\Capacitacion;

use App\Utilities\ModelHelper\Capacitacion\CapacitacionExcel;
use App\Models\Archivo\Archivo;
use Exception;

trait CapacitacionReporte
{
    public function reporte($tipo = 'excel')
    {
        if(!$this->cursos()->count()){
            throw new \Error( __('messages.report-generating-error') );
        }
        app()->setLocale('es');
        return ( new CapacitacionExcel( $this ) )->excel();
    }
}