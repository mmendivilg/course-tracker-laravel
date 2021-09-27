<?php

namespace App\Models\Capacitacion;

use App\Models\Archivo\Archivo;
use Illuminate\Database\Eloquent\Model;

class Capacitador extends Model
{
    protected $table = "capacitadores";

    public function nombreCompleto( $titulo = true ){
        $nombres = $this->nombres;
        $apellidos = $this->apellidos;
        $nombre_completo = implode( " ", [$nombres, $apellidos] );
        if($titulo) {
            return ($this->titulo ? $this->titulo . ' ' : '').$nombre_completo;
        }
        return $nombre_completo;
    }

    public function firma()
    {
        return $this->hasOne(\App\Models\Archivo\Archivo::class, 'id', 'id_firma');
    }

    public function toArray(){
        $array = parent::toArray();
        $array['titulo'] = $this->titulo ?: '';
        $array['nombres'] = $this->nombres ?: '';
        $array['apellidos'] = $this->apellidos ?: '';
        return $array;
    }
}