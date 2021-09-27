<?php

namespace App\Http\Controllers\ClienteEmpresa;

use Illuminate\Http\Request;
use App\Models\ClienteEmpresa\ClienteEmpresa;
use App\Http\Controllers\Controller;
use App\Validations\ClienteEmpresa\ClienteEmpresaValidator;
use Illuminate\Http\UploadedFile;

class ClienteEmpresaController extends Controller
{
    public function index()
    {
        $cliente_empresa = ClienteEmpresa::info()->orderBy('id', 'DESC')->get();
        return $cliente_empresa;
    }

    public function store(Request $request)
    {
        try {
            $validacion = new ClienteEmpresaValidator( null, $request->all() );
            if( $validacion->fails() ) {
                return response()->json( array('errors' => $validacion->errors() ), 400 );
            }
            
            $cliente_empresa = new ClienteEmpresa();
            $cliente_empresa->id_empresa = 1;
            $cliente_empresa->nombre = $request->nombre;
            $cliente_empresa->id_cat_empresa_giro = $request->id_cat_empresa_giro;
            $cliente_empresa->rfc = mb_strtoupper( $request->rfc );
            $cliente_empresa->registro_imss = $request->registro_imss;
            $cliente_empresa->contacto = $request->contacto;
            $cliente_empresa->calle = $request->calle;
            $cliente_empresa->numero = $request->numero;
            $cliente_empresa->codigo_postal = $request->codigo_postal;
            $cliente_empresa->ciudad = $request->ciudad;
            $cliente_empresa->estado = $request->estado;
            $cliente_empresa->pais = $request->pais;
            $cliente_empresa->save();
            
            $cliente_empresa = ClienteEmpresa::info()->find($cliente_empresa->id);

            return $cliente_empresa;
        } catch (\Exception | \Throwable | \Error $e) {
            return response()->json(["error" => $e->getMessage()], 500);
        }
    }

    public function show($id)
    {
        $cliente_empresa = ClienteEmpresa::info()->find($id);
        return $cliente_empresa;
    }

    public function update($id, Request $request)
    {
        try {
            $validacion = new ClienteEmpresaValidator( null, $request->all() );
            if( $validacion->fails() ) {
                return response()->json( array('errors' => $validacion->errors() ), 400 );
            }
            $cliente_empresa = ClienteEmpresa::find($id);
            if(!$cliente_empresa){
                throw new \Error(__('messages.model-not-found-error'));
            }
            $cliente_empresa->nombre = $request->nombre;
            $cliente_empresa->rfc = mb_strtoupper( $request->rfc );
            $cliente_empresa->id_cat_empresa_giro = $request->id_cat_empresa_giro;
            $cliente_empresa->registro_imss = $request->registro_imss;
            $cliente_empresa->contacto = $request->contacto;
            $cliente_empresa->calle = $request->calle;
            $cliente_empresa->numero = $request->numero;
            $cliente_empresa->codigo_postal = $request->codigo_postal;
            $cliente_empresa->ciudad = $request->ciudad;
            $cliente_empresa->estado = $request->estado;
            $cliente_empresa->pais = $request->pais;
            $cliente_empresa->save();

            $cliente_empresa = ClienteEmpresa::info()->find($cliente_empresa->id);

            return $cliente_empresa;
        } catch (\Exception | \Throwable | \Error $e) {
            return response()->json( ["error" => $e->getMessage()], 500 );
        }
    }

    public function destroy($id)
    {
        $cliente_empresa = ClienteEmpresa::info()->find($id);
        // $cliente_empresa->delete_logo();
        return $cliente_empresa->delete();
    }
}
