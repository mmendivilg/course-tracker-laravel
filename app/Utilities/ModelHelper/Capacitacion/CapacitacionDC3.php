<?php

namespace App\Utilities\ModelHelper\Capacitacion;

use Exception;

trait CapacitacionDC3
{
    public function dc3($tipo = 'excel')
    {
        if(!$this->cursos()->count()){
            throw new \Error( __('messages.report-generating-error') );
        }
        app()->setLocale('es');
        switch ($tipo) {
            case 'excel':
                return ( new DC3Excel( $this ) )->excel();
                break;
            case 'pdf':
                return ( new DC3PDF( $this ) )->zip();
                break;
            default:
                throw new \Error( __('messages.report-generating-error') );
                break;
        }
    }
}