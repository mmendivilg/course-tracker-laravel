<?php

namespace App\Validations\Archivo;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\MessageBag;
use App\Validations\Validation;

class ArchivoBase64Validacion extends Validation
{
    public function rules()
    {
        return [
            'archivos.*' => "array",
            'id' => 'integer|required',
        ];
    }

    public function attributes()
    {
        return [
            // 'id_cat_sub_area_ocupacion' => 'Area'
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
