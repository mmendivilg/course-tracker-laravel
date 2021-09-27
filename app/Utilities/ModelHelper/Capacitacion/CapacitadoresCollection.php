<?php

namespace App\Utilities\ModelHelper\Capacitacion;

use App\Models\Capacitacion\Capacitador;

trait CapacitadoresCollection
{
    public function capacitadoresCol()
    {
        $capacitadores_ids = json_decode($this->capacitadores);
        return Capacitador::findMany($capacitadores_ids)->sortBy('id');
    }
}