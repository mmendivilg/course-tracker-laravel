<?php

namespace App\Http\Controllers\Capacitacion;

use Illuminate\Http\Request;
use App\Models\Capacitacion\Capacitacion;
use App\Http\Controllers\Controller;

class CapacitacionCursosController extends Controller
{
    public function show($id)
    {
        try {
            $capacitacion = Capacitacion::find($id);
            if(!$capacitacion->cursos()->count()){
                throw new \Error( __('messages.courses-loading-error') );
            }
            return $capacitacion->cursos();
        } catch (\Exception | \Throwable | \Error $e) {
            return response()->json(["error" => $e->getMessage()], 500);
        }
    }
}
