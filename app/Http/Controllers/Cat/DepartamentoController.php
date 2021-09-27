<?php

namespace App\Http\Controllers\Cat;

use Illuminate\Http\Request;
use App\Models\Trabajador\Departamento;
use App\Http\Controllers\Controller;

class DepartamentoController extends Controller
{
    public function index()
    {
        $departamentos = Departamento::orderBy('id', 'DESC')->get();
        return $departamentos;
    }

    public function show($id)
    {
        $departamento = Departamento::find($id);
        return $departamento;
    }
}
