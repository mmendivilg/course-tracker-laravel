<?php

namespace App\Models\Tag;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\MessageBag;
use App\Utilities\Tag\Tag;
use App\Models\Ocupacion\SubAreaOcupacion;
use InvalidArgumentException;

class SubAreaOcupacionTag extends Tag
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
        //este catálogo no se modifica
        if( $subarea = SubAreaOcupacion::where( 'codigo_sub_area', $texto )->first() ){
            return $subarea->id;
        }

        return null;
    }
}