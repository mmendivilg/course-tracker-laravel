<?php

namespace App\Http\Controllers\Archivo;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Validations\Archivo\ArchivoValidacion;
use App\Utilities\ArchivoApiRespuesta;
use App\Utilities\ArchivoManejador;
use App\Models\Archivo\Archivo;
use App\Utilities\Import\TrabajadorImport;
use \Exception;
use Illuminate\Support\Facades\Config;

class ArchivoController extends Controller
{
    public function store(Request $request)
    {
        try {
            $validacion = new ArchivoValidacion( null, $request->all() );
            if( $validacion->fails() ) {
                return response()->json( array( 'errors' => $validacion->errors() ), 400 );
            }

            $id_empresa = 1;
            $id = $request->id;

            $carpeta_almacenaje = 'archivos/';

            $respuesta = new ArchivoApiRespuesta( true );
            if( isset( $request->all()['archivos'] ) ){
                $archivos = $request->all()['archivos'];
                if( $archivos && count($archivos) > 0 ) {
                    $archivos_guardados = ArchivoManejador::guardaArchivos( $carpeta_almacenaje, $archivos, $id_empresa, $respuesta );
                }
            } else {
                return response()->json(["errors" => ["archivos" => ["Necesitas enviar un archivo"]]], 400);
            }

            return $respuesta->respuesta();

        } catch (\Exception | \Throwable | \Error $e) {
            return response()->json(["error" => $e->getMessage()], 500);
        }
    }

    public function show($id, Request $request)
    {
        $archivo = Archivo::find( $id );

        if( $archivo ) {
            $file = storage_path('app/'.$archivo->path);
            // $contents = file_get_contents($file);
            $importer = new TrabajadorImport($file);
            $result = $importer->import(1);
            return response()->json(['archivo' => $result], 200);
        }
    }
}
