<?php

namespace App\Http\Controllers\Trabajador;

use Illuminate\Http\Request;
use App\Models\Trabajador\Trabajador;
use App\Http\Controllers\Controller;
use App\Models\Empresa\Empresa;
use App\Models\Tag\CursoTag;
use App\Models\Tag\DepartamentoTag;
use App\Models\Tag\PuestoTag;
use App\Validations\Trabajador\TrabajadorValidator;

class TrabajadorController extends Controller
{
    public function index()
    {
        $trabajador = Trabajador::info()->orderBy('id', 'DESC')->get();
        return $trabajador;
    }

    public function store(Request $request)
    {
        try {
            $validacion = new TrabajadorValidator( null, $request->all() );
            if( $validacion->fails() ) {
                return response()->json( array('errors' => $validacion->errors() ), 400 );
            }
            $curso_tag = new CursoTag( Empresa::find(1) );
            $departamento_tag = new DepartamentoTag( Empresa::find(1) );
            $puesto_tag = new PuestoTag( Empresa::find(1) );
            
            $trabajador = new Trabajador();
            $trabajador->id_empresa = 1;
            $trabajador->id_capacitacion = $request->id_capacitacion;
            $trabajador->nombres = $request->nombres;
            $trabajador->apellidos = $request->apellidos;
            $trabajador->numero_colaborador = $request->numero_colaborador;
            $trabajador->rfc = $request->rfc;
            $trabajador->aciertos = $request->aciertos;
            $trabajador->preguntas = $request->preguntas;
            $trabajador->observaciones = $request->observaciones;
            $trabajador->id_cat_curso = $curso_tag->evaluate( 'curso', 'id_cat_curso', $request->toArray() );
            $trabajador->id_cat_departamento = $departamento_tag->evaluate( 'departamento', 'id_cat_departamento', $request->toArray() );
            $trabajador->id_cat_puesto = $puesto_tag->evaluate( 'puesto', 'id_cat_puesto', $request->toArray() );
            $trabajador->id_cat_sub_area_ocupacion = $request->id_cat_sub_area_ocupacion;
            
            $trabajador->save();

            $trabajador = Trabajador::info()->find($trabajador->id);

            return $trabajador;
        } catch (\Exception | \Throwable | \Error $e) {
            return response()->json(["error" => $e->getMessage()], 500);
        }
    }

    public function show($id)
    {
        $trabajador = Trabajador::info()->find($id);
        return $trabajador;
    }

    public function update($id, Request $request)
    {
        try {
            $validacion = new TrabajadorValidator( null, $request->all() );
            if( $validacion->fails() ) {
                return response()->json( array('errors' => $validacion->errors() ), 400 );
            }
            $curso_tag = new CursoTag( Empresa::find(1) );
            $departamento_tag = new DepartamentoTag( Empresa::find(1) );
            $puesto_tag = new PuestoTag( Empresa::find(1) );
            
            $trabajador = Trabajador::find($id);
            $trabajador->id_capacitacion = $request->id_capacitacion;
            $trabajador->nombres = $request->nombres;
            $trabajador->apellidos = $request->apellidos;
            $trabajador->numero_colaborador = $request->numero_colaborador;
            $trabajador->rfc = $request->rfc;
            $trabajador->aciertos = $request->aciertos;
            $trabajador->preguntas = $request->preguntas;
            $trabajador->observaciones = $request->observaciones;
            $trabajador->id_cat_curso = $curso_tag->evaluate( 'curso', 'id_cat_curso', $request->toArray() );
            $trabajador->id_cat_departamento = $departamento_tag->evaluate( 'departamento', 'id_cat_departamento', $request->toArray() );
            $trabajador->id_cat_puesto = $puesto_tag->evaluate( 'puesto', 'id_cat_puesto', $request->toArray() );
            $trabajador->id_cat_sub_area_ocupacion = $request->id_cat_sub_area_ocupacion;
  
            $trabajador->save();

            $trabajador = Trabajador::info()->find($trabajador->id);

            return $trabajador;
        } catch (\Exception | \Throwable | \Error $e) {
            return response()->json( ["error" => $e->getMessage()], 500 );
        }
    }

    public function destroy(Request $request)
    {
        Trabajador::whereIn('id', $request->input('ids'))->delete();
    }
}
