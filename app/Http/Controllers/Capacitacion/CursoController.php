<?php

namespace App\Http\Controllers\Capacitacion;

use Illuminate\Http\Request;
use App\Models\Capacitacion\Curso;
use App\Http\Controllers\Controller;
use App\Validations\Capacitacion\CursoValidator;

class CursoController extends Controller
{
    public function index()
    {
        $curso = Curso::orderBy('id', 'DESC')->get();
        return $curso;
    }

    public function store(Request $request)
    {
        try {
            $validacion = new CursoValidator( null, $request->all() );
            if( $validacion->fails() ) {
                return response()->json( array('errors' => $validacion->errors() ), 400 );
            }
            
            $curso = new Curso();
            $curso->id_empresa = 1;
            $curso->nombre = $request->nombre;
            $curso->save();

            $curso = Curso::find($curso->id);

            return $curso;
        } catch (\Exception | \Throwable | \Error $e) {
            return response()->json(["error" => $e->getMessage()], 500);
        }
    }

    public function show($id)
    {
        $curso = Curso::find($id);
        return $curso;
    }

    public function update($id, Request $request)
    {
        try {
            $validacion = new CursoValidator( null, $request->all() );
            if( $validacion->fails() ) {
                return response()->json( array('errors' => $validacion->errors() ), 400 );
            }
            $curso = Curso::find($id);

            $curso->nombre = $request->nombre;
            $curso->save();

            $curso = Curso::find($curso->id);

            return $curso;
        } catch (\Exception | \Throwable | \Error $e) {
            return response()->json( ["error" => $e->getMessage()], 500 );
        }
    }

    public function destroy($id)
    {
        Curso::find($id)->delete();
    }
}
