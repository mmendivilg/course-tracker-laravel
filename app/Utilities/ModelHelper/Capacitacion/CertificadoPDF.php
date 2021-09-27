<?php
namespace App\Utilities\ModelHelper\Capacitacion;

use App\Models\Archivo\Archivo;
use App\Models\Capacitacion\Capacitacion;
use App\Models\Empresa\Empresa;
use App\Utilities\Container;
use App\Utilities\PDF\PDF;
use Illuminate\Support\Facades\Config;

class CertificadoPDF extends PDF 
{
    protected $capacitacion;
    public function __construct ( Capacitacion $capacitacion ) {
        $this->capacitacion = $capacitacion;
        parent::__construct( 
            $capacitacion->empresa,
            [ Config::get( 'constants.css.certificado-pdf-style' ) ],
            null,
            Config::get( 'constants.plantilla.capacitacion.certificado.ruta.pdf' )
        );
    }

    public function zip() {
        $archivos = $this->pdfs();
        $zip = new \ZipArchive();
        $path = 'reportes/';
        $zip_uuid = uniqid( '', true );
        $zip_ext = "zip";
        $zip_filename = "certificados-{$zip_uuid}.{$zip_ext}";

        $zip_path = Container::container( "app/{$path}", $zip_filename);
        $zip->open( $zip_path, \ZipArchive::CREATE );
        foreach ($archivos as $archivo) {
            $nombre_completo = ($archivo['trabajador'])->nombreCompleto();
            $archivo_ext = ($archivo['archivo'])->extension;
            $zip->addFile( ($archivo['archivo'])->path(), "certificado-{$nombre_completo}-{$zip_uuid}.{$archivo_ext}" );
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

    public function saveWorker( $trabajador ){
        $this->render(
            'certificado.php', 
            [
                'data' => $trabajador->certData(),
                'logo_big' => Config::get('constants.plantilla.capacitacion.certificado.imagenes.logo-big'),
                'logo_circle' => Config::get('constants.plantilla.capacitacion.certificado.imagenes.logo-circle'),
                'logo_eye' => Config::get('constants.plantilla.capacitacion.certificado.imagenes.logo-eye'),
                '_a' => Config::get('constants.plantilla.capacitacion.certificado.imagenes._a'),
                '_b' => Config::get('constants.plantilla.capacitacion.certificado.imagenes._b'),
                'templating' => $this->templating,
            ]
        );

        return $this->save();
    }

    protected function save(){
        $path = 'reportes/';
        $uuid = uniqid( '', true );
        $ext = "pdf";
        $filename = "certificado-{$uuid}.{$ext}";
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