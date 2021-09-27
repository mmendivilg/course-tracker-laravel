<?php

namespace App\Http\Controllers\Cat;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ClienteEmpresa\EmpresaGiro;
use App\Validations\Capacitacion\EmpresaGiroValidator;

class EmpresaGiroController extends Controller
{
    public function index()
    {
        $empresas_giros = EmpresaGiro::orderBy('id', 'DESC')->get();
        return $empresas_giros;
    }

    public function show($id)
    {
        $empresa_giro = EmpresaGiro::find($id);
        return $empresa_giro;
    }

    public function store(Request $request)
    {
        try {
            $validacion = new EmpresaGiroValidator( null, $request->all() );
            if( $validacion->fails() ) {
                return response()->json( array('errors' => $validacion->errors() ), 400 );
            }
            
            $empresa_giro = new EmpresaGiro();
            $empresa_giro->id_empresa = 1;
            $empresa_giro->codigo = $request->codigo;
            $empresa_giro->nombre = $request->nombre;
            $empresa_giro->save();

            $empresa_giro = EmpresaGiro::find($empresa_giro->id);

            return $empresa_giro;
        } catch (\Exception | \Throwable | \Error $e) {
            return response()->json(["error" => $e->getMessage()], 500);
        }
    }

    public function update($id, Request $request)
    {
        try {
            $validacion = new EmpresaGiroValidator( null, $request->all() );
            if( $validacion->fails() ) {
                return response()->json( array('errors' => $validacion->errors() ), 400 );
            }
            $empresa_giro = EmpresaGiro::find($id);

            $empresa_giro->codigo = $request->codigo;
            $empresa_giro->nombre = $request->nombre;
            $empresa_giro->save();

            $empresa_giro = EmpresaGiro::find($empresa_giro->id);

            return $empresa_giro;
        } catch (\Exception | \Throwable | \Error $e) {
            return response()->json( ["error" => $e->getMessage()], 500 );
        }
    }

}
