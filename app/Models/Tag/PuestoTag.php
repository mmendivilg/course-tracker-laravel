<?php

namespace App\Models\Tag;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\MessageBag;
use App\Utilities\Tag\Tag;
use App\Models\Trabajador\Puesto;
use InvalidArgumentException;

class PuestoTag extends Tag
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

        if( $puesto = Puesto::where( 'nombre', $texto)->first() ){
            return $puesto->id;
        }

        $puesto = new Puesto();
        $puesto->id_empresa = $this->empresa->id;
        $puesto->nombre = $texto;
        $puesto->save();
        return $puesto->id;
    }
}