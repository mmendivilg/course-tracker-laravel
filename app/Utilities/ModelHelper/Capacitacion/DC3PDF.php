<?php

namespace App\Utilities\ModelHelper\Capacitacion;

use App\Models\Archivo\Archivo;
use App\Models\Capacitacion\Capacitacion;
use App\Models\Empresa\Empresa;
use App\Utilities\Container;
use App\Utilities\PDF\PDF;
use Exception;
use Illuminate\Support\Facades\Config;

class DC3PDF extends PDF 
{
    protected $capacitacion;
    public function __construct ( Capacitacion $capacitacion ) {
        $this->capacitacion = $capacitacion;
        parent::__construct( 
            $capacitacion->empresa,
            [ Config::get( 'constants.css.dc3-pdf-style' ) ],
            null,
            Config::get( 'constants.plantilla.capacitacion.dc3.ruta.pdf' )
        );
    }

    /**
     * 
     * @return array 
     * @throws Exception 
     */
    public function pdfs() {
        $trabajadores = $this->capacitacion->trabajadores->reject( function( $trabajador, $key ){
            return !$trabajador['id_cat_curso'] || !$trabajador['nombres'];
        });
        $archivos = [];
        foreach ($trabajadores as $trabajador) {
            $archivos[] = [
                'archivo' => $this->saveWorker( $trabajador ),
                'trabajador' => $trabajador,
            ];
            $this->initialize();
        }
        return $archivos;
    }

    public function zip() {
        $archivos = $this->pdfs();
        $zip = new \ZipArchive();
        $path = 'reportes/';
        $zip_uuid = uniqid( '', true );
        $zip_ext = "zip";
        $zip_filename = "dc3-{$zip_uuid}.{$zip_ext}";

        $zip_path = Container::container( "app/{$path}", $zip_filename);
        $zip->open( $zip_path, \ZipArchive::CREATE );
        foreach ($archivos as $archivo) {
            $nombre_completo = ($archivo['trabajador'])->nombreCompleto();
            $archivo_ext = ($archivo['archivo'])->extension;
            $zip->addFile( ($archivo['archivo'])->path(), "dc3-{$nombre_completo}.{$archivo_ext}" );
        }
        $zip->close();

        $archivo = new Archivo;
        $archivo->nombre = $zip_filename;
        $archivo->uuid = $zip_uuid;
        $archivo->extension = $zip_ext;
        $archivo->id_empresa = Empresa::find(1)->id;
        $archivo->path = "{$path}{$zip_filename}";
        $archivo->save();
        return $archivo;
    }

    public function saveWorker( $trabajador ){
        $this->render(
            'dc3.php', 
            [
                'data' => $trabajador->dc3Data(),
                'templating' => $this->templating,
            ]
        );

        $this->setHTMLFooter( 'DC-3 ANVERSO' );
        return $this->save( );
    }

    protected function setHTMLFooter( $var ){
        $html = <<<EOT
        <div class="legend legend1 right">
            $var
        </div>
        EOT;
        $this->mpdf->setHTMLFooter($html);
    }

    protected function save(){
        $path = 'reportes/';
        $uuid = uniqid( '', true );
        $ext = "pdf";
        $filename = "dc3-{$uuid}.{$ext}";
        $this->output( "app/{$path}", $filename );
        
        $archivo = new Archivo;
        $archivo->nombre = $filename;
        $archivo->uuid = $uuid;
        $archivo->extension = $ext;
        $archivo->id_empresa = Empresa::find(1)->id;
        $archivo->path = "{$path}{$filename}";
        $archivo->save();
        return $archivo;
    }
    
}