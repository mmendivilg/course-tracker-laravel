<?php

namespace App\Validations\Capacitacion;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\MessageBag;
use App\Validations\Validation;

class CursoValidator extends Validation
{
    public function rules()
    {
        return [
            'nombre' => 'string|nullable',
        ];
    }

    public function attributes()
    {
        return [
            'nombre' => __('validation.fields.cursos.nombre'),
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
