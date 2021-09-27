<?php

namespace App\Http\Controllers\Cat;

use Illuminate\Http\Request;
use App\Models\Trabajador\Puesto;
use App\Http\Controllers\Controller;

class PuestoController extends Controller
{
    public function index()
    {
        $puestos = Puesto::orderBy('id', 'DESC')->get();
        return $puestos;
    }

    public function show($id)
    {
        $puesto = Puesto::find($id);
        return $puesto;
    }
}
