<?php

namespace App\Models\Capacitacion;

use Illuminate\Database\Eloquent\Model;

class TipoCapacitacion extends Model
{
    protected $table = "cat_tipos_capacitaciones";

    public function enAula() {
        return strcasecmp($this->nombre, 'en aula') == 0;
    }

    public function inSitu() {
        return strcasecmp($this->nombre, 'in situ') == 0;
    }
}
