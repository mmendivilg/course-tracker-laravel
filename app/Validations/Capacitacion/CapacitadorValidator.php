<?php

namespace App\Validations\Capacitacion;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\MessageBag;
use App\Validations\Validation;

class CapacitadorValidator extends Validation
{
    public function rules()
    {
        return [
            'titulo' => 'string|nullable',
            'nombres' => 'string|nullable',
            'apellidos' => 'string|nullable',
            'registro_stps' => 'string|nullable',
        ];
    }

    public function attributes()
    {
        return [
            'titulo' => __('validation.fields.capacitadores.titulo'),
            'nombres' => __('validation.fields.capacitadores.nombres'),
            'apellidos' => __('validation.fields.capacitadores.apellidos'),
            'registro_stps' => __('validation.fields.capacitadores.registro_stps'),
        ];
    }

    public function messages()
    {
        return [
            // 'uuid.required' => 'A uuid is required',
        ];
    }

    public function getOtherValidations(){ }
}
