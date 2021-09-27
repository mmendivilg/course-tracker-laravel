<?php

namespace App\Models\Capacitacion;

use App\Utilities\ModelHelper\Capacitacion\CapacitacionHelper;
use App\Utilities\ModelHelper\Capacitacion\CapacitacionCertificado;
use App\Utilities\ModelHelper\Capacitacion\CapacitacionDC3;
use App\Utilities\ModelHelper\Capacitacion\CapacitacionReporte;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Utilities\ModelHelper\Capacitacion\CapacitadoresCollection;

class Capacitacion extends Model
{
    use CapacitacionReporte, SoftDeletes, CapacitacionHelper, CapacitadoresCollection, CapacitacionDC3, CapacitacionCertificado;
    
    protected $casts = [
        'capacitadores' => 'array',
        'cursos_fechas' => 'array',
        'cursos_capacitadores' => 'array',
    ];

    protected $fillable = [
        'id_empresa',
        'fecha',
        'capacitadores',
        'cursos_fechas',
        'cursos_capacitadores',
        'capacitadores_fechas',
        'id_cat_tipo_capacitacion',
        'id_cat_duracion',
        'id_cliente_empresa',
    ];

    protected $table = "capacitaciones";

    public function scopeInfo($query)
    {
        return $query->with(
            'clienteempresa',
        );
    }

    public function empresa()
    {
        return $this->hasOne(\App\Models\Empresa\Empresa::class, 'id', 'id_empresa');
    }
    
    public function clienteEmpresa()
    {
        return $this->hasOne(\App\Models\ClienteEmpresa\ClienteEmpresa::class, 'id', 'id_cliente_empresa');
    }

    public function trabajadores()
    {
        return $this->hasMany(\App\Models\Trabajador\Trabajador::class, 'id_capacitacion', 'id');
    }

    public function tipoCapacitacion()
    {
        return $this->hasOne(\App\Models\Capacitacion\TipoCapacitacion::class, 'id', 'id_cat_tipo_capacitacion');
    }

    public function duracion()
    {
        return $this->hasOne(\App\Models\Capacitacion\Duracion::class, 'id', 'id_cat_duracion');
    }
    
    public function toArray(){
        $array = parent::toArray();
        $array['capacitadores'] = json_decode($this->capacitadores);
        $array['cursos_fechas'] = json_decode($this->cursos_fechas);
        $array['cursos_capacitadores'] = json_decode($this->cursos_capacitadores);
        return $array;
    }
}
