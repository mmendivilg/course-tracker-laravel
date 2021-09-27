<?php

namespace App\Utilities\ModelHelper\Capacitacion;

use Exception;

trait CapacitacionCertificado
{
    public function certificado($tipo = 'pdf')
    {
        if(!$this->cursos()->count()){
            throw new \Error( __('messages.unexpected-error') );
        }
        app()->setLocale('es');
        switch ($tipo) {
            case 'pdf':
                return ( new CertificadoPDF( $this ) )->zip();
                break;
            default:
                throw new \Error( __('messages.unexpected-error') );
                break;
        }
        
    }
}