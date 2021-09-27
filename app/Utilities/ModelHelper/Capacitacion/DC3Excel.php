<?php

namespace App\Utilities\ModelHelper\Capacitacion;
use App\Models\Capacitacion\Capacitacion;
use App\Utilities\Excel\ExcelWriter;
use Illuminate\Support\Facades\Config;
use App\Models\Archivo\Archivo;
use App\Models\Empresa\Empresa;
use App\Utilities\FechaFormato;

class DC3Excel extends ExcelWriter
{
    protected $capacitacion;
    protected $nombre_hoja_dc3;
    public function __construct ( Capacitacion $capacitacion) {
        $this->capacitacion = $capacitacion;
        parent::__construct( 
            $capacitacion->empresa,
            Config::get( 'constants.plantilla.capacitacion.dc3.ruta.excel' ), 
            'Reporte'
        );
        $this->nombre_hoja_dc3 = "DC-3";
    }

    public function excel() {

        $this->setActiveSheetIndex(0);

        //remover aquellos que no tengan asignado un curso o nombre vacio
        $trabajadores = $this->capacitacion->trabajadores->reject( function( $trabajador, $key ){
            return !$trabajador['id_cat_curso'] || !$trabajador['nombres'];
        });

        foreach ($trabajadores as $trabajador) {
            $this->crear($trabajador);
        }
        // $this->quitarHojaDC3();
        // $this->setActiveSheetIndex(1);
        return $this->save();
    }

    protected function crear($trabajador){
        $clonedWorksheet = clone $this->spreadsheet->getSheetByName($this->nombre_hoja_dc3);
        $clonedWorksheet->setTitle($trabajador->nombreCompleto());
        $this->spreadsheet->addSheet($clonedWorksheet);
        $this->activarHoja($trabajador->nombreCompleto());

        $this->insertarDatos($trabajador);
        // $this->
    }
    
    protected function insertarDatos($trabajador){
        $data = $trabajador->dc3Data();
        
        //***DATOS DEL TRABAJADOR
        //Nombre                $A$6																												
        $this->setCellValue( 'A6', $data['trabajador']['nombre'] );
    
        //RFC
        //
        //$A$8	$B$8	$C$8	$D$8
        $letra = array_shift( $data['trabajador']['rfc']);
        $this->setCellValue( 'A8', $letra );
        $letra = array_shift( $data['trabajador']['rfc']);
        $this->setCellValue( 'B8', $letra );
        $letra = array_shift( $data['trabajador']['rfc']);
        $this->setCellValue( 'C8', $letra );
        $letra = array_shift( $data['trabajador']['rfc']);
        $this->setCellValue( 'D8', $letra );

        //$F$8	$G$8	$H$8	$I$8	$J$8	$K$8
        $letra = array_shift( $data['trabajador']['rfc']);
        $this->setCellValue( 'F8', $letra );
        $letra = array_shift( $data['trabajador']['rfc']);
        $this->setCellValue( 'G8', $letra );
        $letra = array_shift( $data['trabajador']['rfc']);
        $this->setCellValue( 'H8', $letra );
        $letra = array_shift( $data['trabajador']['rfc']);
        $this->setCellValue( 'I8', $letra );
        $letra = array_shift( $data['trabajador']['rfc']);
        $this->setCellValue( 'J8', $letra );
        $letra = array_shift( $data['trabajador']['rfc']);
        $this->setCellValue( 'K8', $letra );

        //$M$8	$N$8	$O$8
        $letra = array_shift( $data['trabajador']['rfc']);
        $this->setCellValue( 'M8', $letra );
        $letra = array_shift( $data['trabajador']['rfc']);
        $this->setCellValue( 'N8', $letra );
        $letra = array_shift( $data['trabajador']['rfc']);
        $this->setCellValue( 'O8', $letra );

        //FIN RFC

        //Puesto    $P$8													
        $this->setCellValue( 'P8', $data['trabajador']['puesto'] );
        
        // FIN DATOS DEL TRABAJADOR

        // DATOS DE LA EMPRESA
        //Nombre o razón social $A$12																												
        $this->setCellValue( 'A12', $data['empresa']['nombre'] );
        //RFC
        //$A$14	$B$14	$C$14	$D$14
        $letra = array_shift( $data['empresa']['rfc'] );
        $this->setCellValue( 'A14', $letra );
        $letra = array_shift( $data['empresa']['rfc'] );
        $this->setCellValue( 'B14', $letra );
        $letra = array_shift( $data['empresa']['rfc'] );
        $this->setCellValue( 'C14', $letra );
        $letra = array_shift( $data['empresa']['rfc'] );
        $this->setCellValue( 'D14', $letra );

        //$F$14	$G$14	$H$14	$I$14	$J$14	$K$14
        $letra = array_shift( $data['empresa']['rfc'] );
        $this->setCellValue( 'F14', $letra );
        $letra = array_shift( $data['empresa']['rfc'] );
        $this->setCellValue( 'G14', $letra );
        $letra = array_shift( $data['empresa']['rfc'] );
        $this->setCellValue( 'H14', $letra );
        $letra = array_shift( $data['empresa']['rfc'] );
        $this->setCellValue( 'I14', $letra );
        $letra = array_shift( $data['empresa']['rfc'] );
        $this->setCellValue( 'J14', $letra );
        $letra = array_shift( $data['empresa']['rfc'] );
        $this->setCellValue( 'K14', $letra );

        //$M$14	$N$14	$O$14
        $letra = array_shift( $data['empresa']['rfc'] );
        $this->setCellValue( 'M14', $letra );
        $letra = array_shift( $data['empresa']['rfc'] );
        $this->setCellValue( 'N14', $letra );
        $letra = array_shift( $data['empresa']['rfc'] );
        $this->setCellValue( 'O14', $letra );

        //FIN RFC

        //REGISTRO IMSS
        //$R$14	$S$14	$T$14	$U$14	$V$14	$W$14	$X$14	$Y$14	$Z$14	$AA$14
        $letra = array_shift( $data['empresa']['imss'] );
        $this->setCellValue( 'R14', $letra );
        $letra = array_shift( $data['empresa']['imss'] );
        $this->setCellValue( 'S14', $letra );
        $letra = array_shift( $data['empresa']['imss'] );
        $this->setCellValue( 'T14', $letra );
        $letra = array_shift( $data['empresa']['imss'] );
        $this->setCellValue( 'U14', $letra );
        $letra = array_shift( $data['empresa']['imss'] );
        $this->setCellValue( 'V14', $letra );
        $letra = array_shift( $data['empresa']['imss'] );
        $this->setCellValue( 'W14', $letra );
        $letra = array_shift( $data['empresa']['imss'] );
        $this->setCellValue( 'X14', $letra );
        $letra = array_shift( $data['empresa']['imss'] );
        $this->setCellValue( 'Y14', $letra );
        $letra = array_shift( $data['empresa']['imss'] );
        $this->setCellValue( 'Z14', $letra );
        $letra = array_shift( $data['empresa']['imss'] );
        $this->setCellValue( 'AA14', $letra );
        
        //$AC$14
        $letra = array_shift( $data['empresa']['imss'] );
        $this->setCellValue( 'AC14', $letra );
        
        //FIN REGISTRO IMSS

        //Actividad o giro principal $A$16																												
        $this->setCellValue( 'A16', $data['empresa']['giro'] );

        // FIN DATOS DE LA EMPRESA

        //DATOS PROGRAMA DE CAPACITACION

        //Nombre    $A$20																												
        $this->setCellValue( 'A20', $data['curso']['nombre'] );

        //Duracion en horas $A$22
        $this->setCellValue( 'A22', $data['curso']['duracion'] );

        //PERIODO DE EJECUCION
        //$P$22	$Q$22	$R$22	$S$22	$T$22	$U$22
        $celdas = ['P22', 'Q22', 'R22', 'S22', 'T22', 'U22'];
        $this->setCellValue( array_shift( $celdas ), array_shift( $data['curso']['fechas']['a'] ) );
        $this->setCellValue( array_shift( $celdas ), array_shift( $data['curso']['fechas']['a'] ) );
        $this->setCellValue( array_shift( $celdas ), array_shift( $data['curso']['fechas']['a'] ) );
        $this->setCellValue( array_shift( $celdas ), array_shift( $data['curso']['fechas']['a'] ) );
        $this->setCellValue( array_shift( $celdas ), array_shift( $data['curso']['fechas']['a'] ) );
        $this->setCellValue( array_shift( $celdas ), array_shift( $data['curso']['fechas']['a'] ) );

        //$X$22	$Y$22	$Z$22	$AA$22	$AB$22	$AC$22
        $celdas = ['X22', 'Y22', 'Z22', 'AA22', 'AB22', 'AC22'];
        $this->setCellValue( array_shift( $celdas ), array_shift( $data['curso']['fechas']['b'] ) );
        $this->setCellValue( array_shift( $celdas ), array_shift( $data['curso']['fechas']['b'] ) );
        $this->setCellValue( array_shift( $celdas ), array_shift( $data['curso']['fechas']['b'] ) );
        $this->setCellValue( array_shift( $celdas ), array_shift( $data['curso']['fechas']['b'] ) );
        $this->setCellValue( array_shift( $celdas ), array_shift( $data['curso']['fechas']['b'] ) );
        $this->setCellValue( array_shift( $celdas ), array_shift( $data['curso']['fechas']['b'] ) );


        //FIN PERIODO DE EJECUCION

        //Nombre agente $A$24																											
        $this->setCellValue( "A24", $data['capacitadores']['nombres_agentes'] );

        //Nombre y firma instructor $A$26																												
        $this->setCellValue( "A26", $data['capacitadores']['nombres'] );

        //FIN DATOS PROGRAMA DE CAPACITACION
        
    }

    protected function quitarHojaDC3() {
        $sheetIndex = $this->getSheetIndex($this->nombre_hoja_dc3);
        $this->spreadsheet->removeSheetByIndex($sheetIndex);
    }

    protected function activarHoja($nombre) {
        $sheetIndex = $this->getSheetIndex($nombre);
        $this->spreadsheet->setActiveSheetIndex($sheetIndex);
    }

    protected function getSheetIndex($name){
        return  $this->spreadsheet->getIndex(
           $this->spreadsheet->getSheetByName($name)
        );
    }
    
    protected function save(){
        // $this->setCellValue('A1', ''); //force document to be scrolled to the top?

        $path = 'reportes/';
        $uuid = uniqid( '', true );
        $ext = "xlsx";
        $filename = "dc3-{$uuid}.{$ext}";
        $this->output( "app/{$path}", $filename, 'Xlsx' );
        
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