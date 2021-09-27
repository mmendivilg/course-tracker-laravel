<?php

namespace App\Http\Controllers\Capacitacion;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Archivo\Archivo;
use App\Models\Empresa\Empresa;
use App\Models\Trabajador\Trabajador;
use App\Utilities\ArchivoApiRespuesta;
use App\Utilities\ArchivoManejador;
use App\Utilities\Import\TrabajadorImport;
use App\Validations\Archivo\ArchivoValidacion;
use Illuminate\Http\Response;

class CapacitacionGrupoController extends Controller
{
    public function show($id)
    {
        $trabajadores = Trabajador::info()
        ->where( 'id_capacitacion', $id )
        ->get();
        return $trabajadores;
    }

    public function store(Request $request, $id_capacitacion)
    {
        try {
            $validacion = new ArchivoValidacion( null, $request->all() );
            if( $validacion->fails() ) {
                throw new \Error( __('messages.invalid-file') );
            }

            $id_empresa = 1;
            $carpeta_almacenaje = 'archivos/';

            $api_respuesta = new ArchivoApiRespuesta( true );
            if( isset( $request->all()['archivos'] ) ){
                $archivos = $request->all()['archivos'];
                if( $archivos && count($archivos) > 0 ) {
                    $archivos_guardados = ArchivoManejador::guardaArchivos( $carpeta_almacenaje, $archivos, $id_empresa, $api_respuesta );
                }
            } else {
                throw new \Error( __('messages.file-needed') );
            }

            $respuesta = $api_respuesta->respuesta();
            if( $respuesta['status'] == 'success' ){
                $archivo = Archivo::find( $respuesta['data'][0]['id_archivo'] );
                if( $archivo ) {
                    $file = storage_path('app/'.$archivo->path);
                    $importer = new TrabajadorImport($file);
                    $result = $importer->import( $id_capacitacion );
                    return response()->json(['total' => $result], 200);
                } else {
                    throw new \Error( __('messages.file-model-not-found-error') );
                }
            } else {
                throw new \Error( __('messages.xlsx-file-read-error') );
            }

        } catch (\Exception | \Throwable | \Error $e) {
            return response()->json(["error" => $e->getMessage()], 500);
        }
    }

    public function template()
    {
        $file = file_get_contents( storage_path('app/plantillas/trabajadores.xlsx') );
        return (new Response($file, 200))
              ->header('Content-Type', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    }
}
