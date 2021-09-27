<?php

namespace App\Http\Controllers\Cat;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Capacitacion\Duracion;
use App\Validations\Capacitacion\DuracionValidator;

class DuracionController extends Controller
{
    public function index()
    {
        $duracion = Duracion::orderBy('id', 'DESC')->get();
        return $duracion;
    }

    public function show($id)
    {
        $duracion = Duracion::find($id);
        return $duracion;
    }

    public function store(Request $request)
    {
        try {
            $validacion = new DuracionValidator( null, $request->all() );
            if( $validacion->fails() ) {
                return response()->json( array('errors' => $validacion->errors() ), 400 );
            }
            
            $duracion = new Duracion();
            $duracion->id_empresa = 1;
            $duracion->nombre = $request->nombre;
            $duracion->horas = $request->horas;
            $duracion->save();

            $duracion = Duracion::find($duracion->id);

            return $duracion;
        } catch (\Exception | \Throwable | \Error $e) {
            return response()->json(["error" => $e->getMessage()], 500);
        }
    }

    public function update($id, Request $request)
    {
        try {
            $validacion = new DuracionValidator( null, $request->all() );
            if( $validacion->fails() ) {
                return response()->json( array('errors' => $validacion->errors() ), 400 );
            }
            $duracion = Duracion::find($id);

            $duracion->nombre = $request->nombre;
            $duracion->horas = $request->horas;
            $duracion->save();

            $duracion = Duracion::find($duracion->id);

            return $duracion;
        } catch (\Exception | \Throwable | \Error $e) {
            return response()->json( ["error" => $e->getMessage()], 500 );
        }
    }

    public function destroy($id)
    {
        $duracion = Duracion::find($id);
        // $duracion->delete_logo();
        return $duracion->delete();
    }
}
