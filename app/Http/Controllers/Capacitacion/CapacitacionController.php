<?php

namespace App\Http\Controllers\Capacitacion;

use Illuminate\Http\Request;
use App\Models\Capacitacion\Capacitacion;
use App\Http\Controllers\Controller;
use App\Models\Empresa\Empresa;
use App\Validations\Capacitacion\CapacitacionValidator;
use \App\Models\Tag\CursoTag;
use App\Validations\Validation;

class CapacitacionController extends Controller
{
    public function index()
    {
        $capacitacion = Capacitacion::info()->withCount('trabajadores')->orderBy('id', 'DESC')->get();
        return $capacitacion;
    }

    public function store(Request $request)
    {
        try {
            $validacion = new CapacitacionValidator( null, $request->all() );
            if( $validacion->fails() ) {
                return response()->json( array('errors' => $validacion->errors() ), 400 );
            }
            $capacitacion = new Capacitacion();
            $capacitacion->id_empresa = 1;
            $capacitacion->fecha = $request->fecha;
            $capacitacion->capacitadores = json_encode( $request->capacitadores );
            $capacitacion->id_cat_tipo_capacitacion = $request->id_cat_tipo_capacitacion;
            $capacitacion->id_cat_duracion = $request->id_cat_duracion;
            $capacitacion->id_cliente_empresa = $request->id_cliente_empresa;
            $capacitacion->save();

            $capacitacion = Capacitacion::info()->find($capacitacion->id);

            return $capacitacion;
        } catch (\Exception | \Throwable | \Error $e) {
            return response()->json(["error" => $e->getMessage()], 500);
        }
    }

    public function show($id)
    {
        $capacitacion = Capacitacion::info()->find($id);
        return $capacitacion;
    }

    public function update($id, Request $request)
    {
        try {
            $validacion = new CapacitacionValidator( null, $request->all() );
            if( $validacion->fails() ) {
                return response()->json( array('errors' => $validacion->errors() ), 400 );
            }
            $capacitacion = Capacitacion::find($id);
            $capacitacion->update([
                'fecha' => $request->input('fecha', $capacitacion->fecha),
                'capacitadores' => $request->capacitadores ? json_encode( $request->capacitadores ) : $capacitacion->capacitadores,
                'cursos_fechas' => $request->cursos_fechas ? json_encode( $request->cursos_fechas ) : $capacitacion->cursos_fechas,
                'cursos_capacitadores' => $request->cursos_capacitadores ? json_encode( $request->cursos_capacitadores ) : $capacitacion->cursos_capacitadores,
                'id_cat_tipo_capacitacion' => $request->input('id_cat_tipo_capacitacion', $capacitacion->id_cat_tipo_capacitacion),
                'id_cat_duracion' => $request->input('id_cat_duracion', $capacitacion->id_cat_duracion),
                'id_cliente_empresa' => $request->input('id_cliente_empresa', $capacitacion->id_cliente_empresa),
            ]);

            $capacitacion = Capacitacion::info()->find($capacitacion->id);

            return $capacitacion;
        } catch (\Exception | \Throwable | \Error $e) {
            return response()->json( ["error" => $e->getMessage()], 500 );
        }
    }
    
    public function destroy($id)
    {
        Capacitacion::find($id)->delete();
    }
}
