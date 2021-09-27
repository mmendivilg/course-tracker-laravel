<?php

namespace App\Http\Controllers\Cat;

use Illuminate\Http\Request;
use App\Models\Ocupacion\SubAreaOcupacion;
use App\Models\Ocupacion\AreaOcupacion;
use App\Http\Controllers\Controller;

class SubAreaOcupacionController extends Controller
{
    public function index()
    {
        $sub_areas_ocupaciones = SubAreaOcupacion::orderBy('id', 'DESC')->get();
        return $sub_areas_ocupaciones;
    }

    public function vselect()
    {
        $res = [];
        foreach (AreaOcupacion::all() as $area_ocupacion) {
            $res[] = [
                'header' => "{$area_ocupacion->codigo_area} {$area_ocupacion->nombre}",
                'disabled' => true
            ];
            foreach (SubAreaOcupacion::where('id_cat_area_ocupacion', $area_ocupacion->id)->get() as $sub_area_ocupacion) {
                $res[] = [
                    'nombre' => "{$sub_area_ocupacion->codigo_sub_area} {$sub_area_ocupacion->nombre}",
                    'id' => $sub_area_ocupacion->id
                ];
            }
        }
        return $res;
    }

    public function show($id)
    {
        $sub_area_ocupacion = SubAreaOcupacion::find($id);
        return $sub_area_ocupacion;
    }
}
