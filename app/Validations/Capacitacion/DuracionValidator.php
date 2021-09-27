<?php

namespace App\Validations\Capacitacion;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\MessageBag;
use App\Validations\Validation;

class DuracionValidator extends Validation
{
    public function rules()
    {
        return [
            'nombre' => 'required|string',
            'horas' => 'required|numeric',
        ];
    }

    public function attributes()
    {
        return [
            'nombre' => __('validation.fields.duraciones.nombre'),
            'horas' => __('validation.fields.duraciones.horas'),
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
