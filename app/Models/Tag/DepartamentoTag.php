<?php

namespace App\Models\Tag;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\MessageBag;
use App\Utilities\Tag\Tag;
use App\Models\Capacitacion\Curso;
use App\Models\Trabajador\Departamento;
use InvalidArgumentException;

/**
 * 
 * @package App\Utilidades\Etiqueta\Catalogo
 */
class DepartamentoTag extends Tag
{
    /**
     * 
     * @param mixed $texto 
     * @return mixed 
     * @throws InvalidArgumentException 
     */
    public function create( $texto = null ){ 
        if( !$texto ){
            return null;
        }

        if( $departamento = Departamento::where( 'nombre', $texto)->first() ){
            return $departamento->id;
        }

        $departamento = new Departamento();
        $departamento->id_empresa = $this->empresa->id;
        $departamento->nombre = $texto;
        $departamento->save();
        return $departamento->id;
    }
}