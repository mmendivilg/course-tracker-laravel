<?php

namespace App\Validations\ClienteEmpresa;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\MessageBag;
use App\Validations\Validation;

class ClienteEmpresaValidator extends Validation
{
    public function rules()
    {
        return [
            'nombre' => 'string|required',
            'rfc' => 'string|max:20|nullable',
            'registro_imss' => 'string|nullable',
            'id_cat_empresa_giro' => 'integer|nullable',
            'contacto' => 'string|nullable',
            'logotipo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048|nullable',
            'calle' => 'string|nullable',
            'numero' => 'string|nullable',
            'codigo_postal' => 'string|nullable',
            'ciudad' => 'string|nullable',
            'estado' => 'string|nullable',
            'pais' => 'string|nullable',
        ];
    }

    public function attributes()
    {
        return [
            'nombre' => __('validation.fields.clientes-empresas.nombre'),
            'rfc' => __('validation.fields.clientes-empresas.rfc'),
            'registro_imss' => __('validation.fields.clientes-empresas.registro_imss'),
            'contacto' => __('validation.fields.clientes-empresas.contacto'),
            'id_cat_empresa_giro' => __('validation.fields.clientes-empresas.id_cat_empresa_giro'),
            'calle' => __('validation.fields.clientes-empresas.calle'),
            'numero' => __('validation.fields.clientes-empresas.numero'),
            'codigo_postal' => __('validation.fields.clientes-empresas.codigo_postal'),
            'ciudad' => __('validation.fields.clientes-empresas.ciudad'),
            'estado' => __('validation.fields.clientes-empresas.estado'),
            'pais' => __('validation.fields.clientes-empresas.pais'),
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
