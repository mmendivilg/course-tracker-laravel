<?php

namespace App\Validations;

use Illuminate\Support\Facades\Validator;

/**
 *
 * @package App\Validaciones
 */
abstract class Validation
{
    protected $errors;
    protected $model;
    protected $data;

    /**
     *
     * @param mixed $model
     * @param mixed|null $data
     * @return void
     */
    public function __construct($model, $data = null) {
        $this->model = $model;
        $this->data = $data;
    }

    /**
     * Definir las reglas para la instancias Validator
     * @return mixed
     */
    abstract public function rules();

    /**
     * Definir los mensajes para la instancia Validator
     * @return mixed
     */
    abstract public function messages();

    /**
     * Se implementa cuando sea necesario validar manualmente
     * algun campo
     * Es necesario armar un arreglo con valores de falso/verdadero
     * dentro de la funcion y retornarlo
     * @return mixed
     */
    abstract public function getOtherValidations();

    abstract public function attributes();

    /**
     * Crear instancia Validator
     * @return Illuminate\Contracts\Validation\Validator
     */
    protected function validation(){
        $rules = $this->rules();
        $messages = $this->messages();
        $data = null;
        if($this->model){
            //significa que es modelo de Eloquent con lo que se cuenta
            $class = get_class($this->model);
            $hidden = ( new $class() )->getHidden();
            $this->model->makeVisible($hidden);
            $data = $this->model->toArray();
        } else {
            //solo se cuenta con un arreglo basico
            $data = $this->data;
        }
        return Validator::make( $data, $rules, $messages, $this->attributes() );
    }

    /**
     * Ejecutar validaciones automaticas usando la instancia Validator
     * @return bool
     */
    public function fails(){
        $validator = $this->validation();
        return $validator->fails();
    }

    /**
     * Ejecutar validaciones manuales y evaluar si todas son
     * validas
     * @return mixed
     */
    public function otherValidations(){
        $this->errors = [];
        //obtener un arreglo con valores falso/verdadero
        $validations = $this->getOtherValidations();
        //evaluar que todas las validaciones sean true
        return $validations ? min( $validations ) : true;
    }

    /**
     * Combinar los errores adicionales con los de la instancia Validator
     * @return array Contiene el resultado de los errores
     */
    public function errors(){
        // errores de otrasValidaciones()
        $errors = $this->errors;
        $validation = $this->validation();
        //agregar los errores que resultaron de otrasValidaciones()
        $this->addErrors( $errors, $validation );
        //crear una copia en la variable por que se destruye al llamar fails()
        $error_bag = $validation->errors()->messages();
        //es necesario revalidar para poder combinar los errores
        if ( $validation->fails() ) { //se borran errores
            $this->addErrors( $errors, $validation ); //de nuevo agregarlos
            return $validation->errors()->messages();
        }
        //errores que se evaluaron en otrasValidaciones()
        return $error_bag;
    }

    /**
     * Agrega errores a la instancia $validator
     * @param mixed $errors
     * @param mixed $validator
     * @return void
     */
    protected function addErrors( $errors, &$validator ){
        $errors = $errors ?: [];
        foreach ( $errors as $error ) {
            $validator->errors()->add( $error['field'], $error['message'] );
        }
    }

    /**
     * Verifica que el valor venga especificado en el request antes de asignar
     * algun valor, esto evita que cuando no venga definido en el request
     * asigne valor false a un posible existente true
     * @param mixed $model
     * @param mixed $field
     * @param mixed $data
     * @return void
     */
    static public function bool( &$model, $field, $data ){
        if( isset( $data[$field] ) ) {
            $model->{$field} = $data[$field];
        }
    }
}
