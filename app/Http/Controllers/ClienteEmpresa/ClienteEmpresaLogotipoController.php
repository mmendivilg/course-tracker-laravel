<?php

namespace App\Http\Controllers\ClienteEmpresa;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Archivo\Archivo;
use App\Models\ClienteEmpresa\ClienteEmpresa;
use Illuminate\Http\UploadedFile;

class ClienteEmpresaLogotipoController extends Controller
{
    public function show($id)
    {
        $cliente_empresa = ClienteEmpresa::find($id);
        $archivo = Archivo::find($cliente_empresa->id_logotipo);
        if($archivo){
            $file = storage_path('app/'.$archivo->path);
            $contents = file_get_contents($file);
            $mime = mime_content_type($file);
            return 'data:'.$mime.';base64,'.base64_encode($contents);
        }
        return;
    }

    public function update($id, Request $request)
    {
        try {
            $cliente_empresa = ClienteEmpresa::find($id);

            if(!$cliente_empresa){
                throw new \Error('No existe el registro');
            }

            if( isset( $request->all()['logotipo'] ) ){
                $logotipo = $request->all()['logotipo'];
                if( $logotipo instanceof UploadedFile ){
                    $cliente_empresa->update_logo( $logotipo );
                }
            }

            return true;
        } catch (\Exception | \Throwable | \Error $e) {
            return response()->json( ["error" => $e->getMessage()], 500 );
        }
    }

    public function destroy($id)
    {
        $cliente_empresa = ClienteEmpresa::find($id);
        return $cliente_empresa ? $cliente_empresa->delete_logo() : 0;
    }
}
