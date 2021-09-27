<?php
namespace App\Utilities\ModelHelper\Capacitacion\CapacitacionCurso;

use Illuminate\Contracts\Container\BindingResolutionException;
use Error;

class CapacitacionCursos
{
    public $curso_datos;

    /**
     * 
     * @param mixed $curso_datos 
     * @param mixed $class 
     * @return void 
     */
    public function __construct ( $curso_datos ) {
        $this->curso_datos = [];
        $curso_datos = $curso_datos ?: [];
        foreach ($curso_datos as $curso_datos) {
            $this->curso_datos[] = new CapacitacionCurso($curso_datos);
        }
    }

    /**
     * 
     * @param mixed $id_curso 
     * @return CapacitacionCurso 
     * @throws BindingResolutionException 
     * @throws Error 
     */
    public function getCurso($id_curso){
        foreach ($this->curso_datos as $curso_datos) {
            if( $curso_datos->id_curso === $id_curso ){
                return $curso_datos;
            }
        }
        return;
    }
}