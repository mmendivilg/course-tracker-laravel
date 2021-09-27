<?php

namespace App\Validations\ClienteEmpresa;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\MessageBag;
use App\Validations\Validation;

class EmpresaGiroValidator extends Validation
{
    public function rules()
    {
        return [
            'nombre' => 'required|string',
            'codigo' => 'required|string',
        ];
    }

    public function attributes()
    {
        return [
            'nombre' => __('validation.fields.empresas-giros.nombre'),
            'codigo' => __('validation.fields.empresas-giros.codigo'),
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
