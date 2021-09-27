<?php

namespace App\Models\ClienteEmpresa;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Utilities\Helper\Logotipo;

class ClienteEmpresa extends Model
{
    use SoftDeletes, Logotipo;
    protected $table = "clientes_empresas";

    public function scopeInfo($query)
    {
        return $query->with(
            'logotipo',
            'empresagiro',
        );
    }

    public function logotipo()
    {
        return $this->hasOne(\App\Models\Archivo\Archivo::class, 'id', 'id_logotipo');
    }

    public function empresaGiro()
    {
        return $this->hasOne(EmpresaGiro::class, 'id', 'id_cat_empresa_giro');
    }

    public function toArray(){
        $array = parent::toArray();
        $empresa_giro = $this->empresaGiro()->first();
        $array['giro'] = $empresa_giro ? $empresa_giro->nombre : '';
        return $array;
    }
}
