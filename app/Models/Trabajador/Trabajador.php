<?php

namespace App\Models\Trabajador;

use App\Utilities\ModelHelper\Trabajador\DC3;
use App\Utilities\ModelHelper\Trabajador\Certificado;
use App\Utilities\ModelHelper\Trabajador\Calificacion;
use Illuminate\Database\Eloquent\Model;

class Trabajador extends Model
{
    use Calificacion, DC3, Certificado;
    
    protected $table = "trabajadores";
    
    protected $casts = [
        // 'lng' => 'float',
    ];

    public function curso()
    {
        return $this->hasOne(\App\Models\Capacitacion\Curso::class, 'id', 'id_cat_curso');
    }

    public function capacitacion()
    {
        return $this->hasOne(\App\Models\Capacitacion\Capacitacion::class, 'id', 'id_capacitacion');
    }

    public function subAreaOcupacion()
    {
        return $this->hasOne(\App\Models\Ocupacion\SubAreaOcupacion::class, 'id', 'id_cat_sub_area_ocupacion');
    }

    public function departamento()
    {
        return $this->hasOne(\App\Models\Trabajador\Departamento::class, 'id', 'id_cat_departamento');
    }

    public function puesto()
    {
        return $this->hasOne(\App\Models\Trabajador\Puesto::class, 'id', 'id_cat_puesto');
    }
    
    public function nombreCompleto(){
        $nombres = $this->nombres;
        $apellidos = $this->apellidos;
        return implode( " ", [$nombres, $apellidos] );
    }
    
    public function scopeInfo($query)
    {
        return $query->with(
            'curso',
            'departamento',
            'puesto',
            'subareaocupacion',
            'capacitacion',
        );
    }

    public function toArray(){
        $array = parent::toArray();
        $array['aprobado'] = $this->aprobado();
        $array['reprobado'] = $this->reprobado();
        $array['calificacion'] = $this->calificacion();
        $array['nombrecompleto'] = $this->nombreCompleto();
        // $array['position'] = $this->position;

        // 'id_empresa'
        // 'id_capacitacion'
        // 'id_cat_curso'
        // 'nombres'
        // 'apellidos'
        // 'numero_colaborador'
        // 'aciertos'
        // 'preguntas'
        // 'observaciones'
        // 'id_cat_departamento'
        // 'id_cat_puesto'
        // 'id_cat_sub_area_ocupacion'

        return $array;
    }
}
