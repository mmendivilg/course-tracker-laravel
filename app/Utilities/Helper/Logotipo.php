<?php
namespace App\Utilities\Helper;

use App\Models\Archivo\Archivo;
use Illuminate\Http\Request;
use App\Utilities\ArchivoApiRespuesta;
use App\Utilities\ArchivoManejador;
use Exception;
use Illuminate\Http\UploadedFile;

/**
 * Funciones para modificar el logotipo
 * @package App\Utilidades\Helper\Empresa
 */
trait Logotipo
{   
    /**
     * 
     * @param Request $request 
     * @return mixed 
     */
    public function update_logo(UploadedFile $archivo){
        $api_r = new ArchivoApiRespuesta(true);
        $carpeta_almacenaje = 'logotipos/';
        ArchivoManejador::guardaArchivo(
            $carpeta_almacenaje,
            $archivo,
            $this->id_empresa,
            $api_r
        );
        $respuesta = $api_r->respuesta();
        $archivo = Archivo::find( $respuesta['data'][0]['id_archivo'] );

        $this->id_logotipo = $archivo->id;
        return $this->save();
    }

    /**
     * 
     * @param Request $request 
     * @param mixed $id 
     * @return mixed 
     * @throws Exception 
     */
    public function delete_logo(){
        $archivo = Archivo::find( $this->id_logotipo );
        $archivo->delete();
        $this->id_logotipo = null;
        return $this->save();
    }

    public function logo() {
        $archivo = Archivo::find( $this->id_logotipo );
        return storage_path('app/'.$archivo->path);
    }
}