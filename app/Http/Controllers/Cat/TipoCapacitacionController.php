<?php

namespace App\Http\Controllers\Cat;

use Illuminate\Http\Request;
use App\Models\Capacitacion\TipoCapacitacion;
use App\Http\Controllers\Controller;

class TipoCapacitacionController extends Controller
{
    public function index()
    {
        $tipo_capacitacion = TipoCapacitacion::orderBy('id', 'DESC')->get();
        return $tipo_capacitacion;
    }

    public function show($id)
    {
        $tipo_capacitacion = TipoCapacitacion::find($id);
        return $tipo_capacitacion;
    }
}
