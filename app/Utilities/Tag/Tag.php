<?php

namespace App\Utilities\Tag;
use App\Models\Empresa\Empresa;

/**
 * Soporte para crear registros de catalogos
 * en el sistema recibiendo un arreglo de 
 * multiples registros para crear
 * @package App\Utilidades\Etiqueta
 */
abstract class Tag
{
    /**
     * Empresa asociada
     * @var Empresa
     */
    public $empresa;

    /**
     * 
     * @param Empresa $empresa 
     * @return void 
     */
    public function __construct ( Empresa $empresa ) {
        $this->empresa = $empresa;
    }

    /**
     * Evaluar si es un regristro nuevo por cada elemento
     * en el arreglo que viene en el $request
     * @param mixed $datos 
     * @return null 
     */
    public function generate( $datos ) {
        $datos = $datos ?: [];
        foreach ($datos as &$elemento) {
            $id = $elemento['id'];
            $texto = $elemento['texto'];
            if( !$id ) {
                $id = $this->create( $texto );
                $elemento['id'] = $id;
            }
        }
        return $datos ?: null;
    }

    public function evaluate( string $field, string $field_id, array $data ) {
        if( isset( $data[$field] ) ) {
            if( is_array( $data[$field] ) ){
                return $data[$field]['id'];
            }
            if( is_string( $data[$field] ) ){
                return $this->create( $data[$field] );
            }
        } else if( isset( $data[$field_id] ) ) {
            return $data[$field_id];
        }
        return null;
    }

    /**
     * Implementar para llevar a cabo la creacion adecuada.
     * Hay subclases para cada catalogo
     * que implementan esta funcion
     * @param mixed $texto 
     * @return mixed 
     */
    abstract public function create( $texto );
}
