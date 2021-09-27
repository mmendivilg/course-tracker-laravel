<?php

namespace App\Validations\Capacitacion;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\MessageBag;
use App\Validations\Validation;

class CapacitacionValidator extends Validation
{
    public function rules()
    {
        return [
            'fecha' => 'date|nullable',
            'capacitadores' => 'array',
            'cursos_fechas' => 'array',
            'cursos_capacitadores' => 'array',
            'id_cat_tipo_capacitacion' => 'integer|nullable',
            'id_cat_duracion' => 'integer|nullable',
            'id_cliente_empresa' => 'integer|nullable'
        ];
    }

    public function attributes()
    {
        return [
            'fecha' => __('validation.fields.capacitaciones.fecha'),
            'capacitadores' => __('validation.fields.capacitaciones.capacitadores'),
            'id_cat_tipo_capacitacion' => __('validation.fields.capacitaciones.id_cat_tipo_capacitacion'),
            'id_cat_duracion' => __('validation.fields.capacitaciones.id_cat_duracion'),
            'id_cliente_empresa' => __('validation.fields.capacitaciones.id_cliente_empresa'),
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
