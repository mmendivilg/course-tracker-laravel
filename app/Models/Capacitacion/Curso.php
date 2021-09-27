<?php

namespace App\Models\Capacitacion;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    protected $table = "cat_cursos";

    public function trabajadores()
    {
        return $this->hasMany(\App\Models\Trabajador\Trabajador::class, 'id_cat_curso', 'id');
    }
}