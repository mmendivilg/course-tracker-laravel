<?php

namespace App\Models\Tag;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\MessageBag;
use App\Utilities\Tag\Tag;
use App\Models\Capacitacion\Curso;
use InvalidArgumentException;

/**
 * 
 * @package App\Utilidades\Etiqueta\Catalogo
 */
class CursoTag extends Tag
{
    /**
     * 
     * @param mixed $texto 
     * @return mixed 
     * @throws InvalidArgumentException 
     */
    public function create( $texto ){ 
        if( !$texto ){
            return null;
        }
        
        if( $curso = Curso::where( 'nombre', $texto)->first() ){
            return $curso->id;
        }
        $curso = new Curso();
        $curso->id_empresa = $this->empresa->id;
        $curso->nombre = $texto;
        $curso->save();
        return $curso->id;
    }
}