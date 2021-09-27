<?php

namespace App\Validations\Trabajador;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\MessageBag;
use App\Validations\Validation;

class TrabajadorValidator extends Validation
{
    public function rules()
    {
        return [
            'id_capacitacion' => 'integer|required',
            'nombres' => 'string|nullable',
            'apellidos' => 'string|nullable',
            'numero_colaborador' => 'string|nullable',
            'rfc' => 'string|max:20|nullable',
            'aciertos' => 'integer|nullable',
            'preguntas' => 'integer|nullable',
            'observaciones' => 'string|nullable',
            'id_cat_curso' => 'integer|nullable',
            'id_cat_departamento' => 'integer|nullable',
            'id_cat_puesto' => 'integer|nullable',
            'id_cat_sub_area_ocupacion' => 'integer|nullable',
            'curso' => 'nullable',
            'departamento' => 'nullable',
            'puesto' => 'nullable',
        ];
    }

    public function attributes()
    {
        return [
            'nombres' => __('validation.fields.trabajadores.nombres'),
            'apellidos' => __('validation.fields.trabajadores.apellidos'),
            'numero_colaborador' => __('validation.fields.trabajadores.numero_colaborador'),
            'rfc' => __('validation.fields.trabajadores.rfc'),
            'id_capacitacion' => __('validation.fields.trabajadores.id_capacitacion'),
            'aciertos' => __('validation.fields.trabajadores.aciertos'),
            'preguntas' => __('validation.fields.trabajadores.preguntas'),
            'observaciones' => __('validation.fields.trabajadores.observaciones'),
            'curso' => __('validation.fields.trabajadores.id_cat_curso'),
            'departamento' => __('validation.fields.trabajadores.id_cat_departamento'),
            'puesto' => __('validation.fields.trabajadores.id_cat_puesto'),
            'id_cat_curso' => __('validation.fields.trabajadores.id_cat_curso'),
            'id_cat_departamento' => __('validation.fields.trabajadores.id_cat_departamento'),
            'id_cat_puesto' => __('validation.fields.trabajadores.id_cat_puesto'),
            'id_cat_sub_area_ocupacion' => __('validation.fields.trabajadores.id_cat_sub_area_ocupacion'),
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
