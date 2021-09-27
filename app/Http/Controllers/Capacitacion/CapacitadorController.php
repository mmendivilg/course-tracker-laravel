<?php

namespace App\Http\Controllers\Capacitacion;

use Illuminate\Http\Request;
use App\Models\Capacitacion\Capacitador;
use App\Http\Controllers\Controller;
use App\Validations\Capacitacion\CapacitadorValidator;

class CapacitadorController extends Controller
{
    public function index()
    {
        $capacitador = Capacitador::orderBy('id', 'ASC')->get();
        return $capacitador;
    }

    public function store(Request $request)
    {
        try {
            $validacion = new CapacitadorValidator( null, $request->all() );
            if( $validacion->fails() ) {
                return response()->json( array('errors' => $validacion->errors() ), 400 );
            }
            
            $capacitador = new Capacitador();
            $capacitador->id_empresa = 1;
            $capacitador->titulo = $request->titulo;
            $capacitador->nombres = $request->nombres;
            $capacitador->apellidos = $request->apellidos;
            $capacitador->registro_stps = $request->registro_stps;
            $capacitador->save();

            $capacitador = Capacitador::find($capacitador->id);

            return $capacitador;
        } catch (\Exception | \Throwable | \Error $e) {
            return response()->json(["error" => $e->getMessage()], 500);
        }
    }

    public function show($id)
    {
        $capacitador = Capacitador::find($id);
        return $capacitador;
    }

    public function update($id, Request $request)
    {
        try {
            $validacion = new CapacitadorValidator( null, $request->all() );
            if( $validacion->fails() ) {
                return response()->json( array('errors' => $validacion->errors() ), 400 );
            }
            $capacitador = Capacitador::find($id);

            $capacitador->titulo = $request->titulo;
            $capacitador->nombres = $request->nombres;
            $capacitador->apellidos = $request->apellidos;
            $capacitador->registro_stps = $request->registro_stps;
            $capacitador->save();

            $capacitador = Capacitador::find($capacitador->id);

            return $capacitador;
        } catch (\Exception | \Throwable | \Error $e) {
            return response()->json( ["error" => $e->getMessage()], 500 );
        }
    }

    public function destroy($id)
    {
        Capacitador::find($id)->delete();
    }
}
