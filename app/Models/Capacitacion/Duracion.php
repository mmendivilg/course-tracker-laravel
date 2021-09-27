<?php

namespace App\Models\Capacitacion;

use Illuminate\Database\Eloquent\Model;

class Duracion extends Model
{
    protected $table = "cat_duraciones";

    public function horasRounded(){
        return floatval( $this->horas );
    }
}
