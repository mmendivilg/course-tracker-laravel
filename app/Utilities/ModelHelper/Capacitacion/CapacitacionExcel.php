<?php

namespace App\Utilities\ModelHelper\Capacitacion;
use App\Models\Capacitacion\Capacitacion;
use App\Utilities\Excel\ExcelWriter;
use Illuminate\Support\Facades\Config;
use App\Models\Archivo\Archivo;
use App\Models\Empresa\Empresa;
use App\Utilities\FechaFormato;

class CapacitacionExcel extends ExcelWriter
{
    protected $capacitacion;
    public function __construct ( Capacitacion $capacitacion) {
        $this->capacitacion = $capacitacion;
        parent::__construct( 
            $capacitacion->empresa,
            Config::get( 'constants.plantilla.capacitacion.reporte.ruta.excel' ), 
            'Reporte'
        );
    }

    public function excel( ) {

        $this->setActiveSheetIndex(0);

        $this->insertLogoCliente('H3');

        $header_last_row = $this->header();
        
        $this->workers( $header_last_row );
        
        return $this->save();
    }

    protected function header(){
        //Establecimiento                       C11
        $this->setCellValue( 'C11', $this->capacitacion->clienteEmpresa->nombre );
        
        //Contacto                              C12
        $this->setCellValue( 'C12', $this->capacitacion->clienteEmpresa->contacto );

        //Tipo de Capacitacion  En Aula         "X" => D13
        if( $this->capacitacion->tipoCapacitacion->enAula() ){
            $this->setCellValue( 'D13', "X" );
        }

        //Tipo de Capacitacion  In Situ         "X" => D14
        if( $this->capacitacion->tipoCapacitacion->inSitu() ){
            $this->setCellValue( 'D14', "X" );
        }
        
        //Curso/Tema                            C14 -> (C15 -> ?)
        $current_row = 15;
        $cursos_row = $current_row + 1;
        $count_cursos = $this->capacitacion->cursos()->each( function( $curso, $key ) use ( $cursos_row ) {
            if( $key > 1 ){
                $this->insertNewRowBefore($cursos_row, 1);
                $this->mergeCells( "C{$cursos_row}:E{$cursos_row}" );
            }
        })->each( function( $curso, $key ) use ( &$current_row ) {
            $this->setCellValue( "C{$current_row}", $curso->nombre );
            $current_row++;
        })->count(); 
        if($count_cursos == 1){
            $this->removeRow( $cursos_row, 1 );
        }
        
        //Fecha                                 C?
        $fecha = new FechaFormato( $this->capacitacion->fecha, 'Y-m-d' );
        $this->setCellValue( "C{$current_row}", $fecha->fechaCompleta() );
        $current_row++;

        //Duracion                              C?
        $this->setCellValue( "C{$current_row}", $this->capacitacion->duracion->nombre );
        $current_row++;

        //No Participantes                      C?
        $this->setCellValue( "C{$current_row}", $this->capacitacion->trabajadores->count() );
        $current_row++;

        //Instructores                          C?
        $capacitadores = $this->capacitacion->capacitadoresCol();
        if( count($capacitadores) ){
            $capacitadores_texto = $capacitadores->map( function( $capacitador, $key ) {
                return $capacitador->nombreCompleto();
            })->join(' / ');
            $this->setCellValue( "C{$current_row}", $capacitadores_texto );
        }
        
        //Porcentaje aprobados: n%              F13
        $porcentaje = $this->capacitacion->porcentajeAprobados();
        $this->setCellValue( "F13", "Porcentaje de aprobados: {$porcentaje}%" );
        
        //Registro STPS                         F?
        if( count($capacitadores) ){
            $registros_stps = $capacitadores->map( function( $capacitador, $key ) {
                return $capacitador->registro_stps;
            })->join(', ');
        }
        $this->setCellValue( "F{$current_row}", "Registro STPS: {$registros_stps}" );
        
        return $current_row;
    }

    protected function insertLogoCliente( $cell ){
        if($this->capacitacion->clienteEmpresa->logotipo){
            $logo_path = storage_path('app/'.$this->capacitacion->clienteEmpresa->logotipo->path);
            $this->insertaLogotipo( $logo_path, $cell );
        }
    }
    
    protected function save(){
        $this->setCellValue('A1', ''); //force document to be scrolled to the top?

        $path = 'reportes/';
        $uuid = uniqid( '', true );
        $ext = "xlsx";
        $filename = "reporte-{$uuid}.{$ext}";

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
    
    protected function workers( $header_last_row ){
        $current_row = $header_last_row + 3;
        $counter = 1;
        $this->capacitacion->cursos()->each( function( $curso, $key ) use ( $current_row ) {
            $trabajadores = $curso->trabajadores->where('id_capacitacion', $this->capacitacion->id);
            $trabajadores->each( function( $trabajador, $key) use ( $current_row ) {
                $this->insertNewRowBefore($current_row, 1);
            });
            $this->insertNewRowBefore($current_row, 1);
        });

        foreach ($this->capacitacion->cursos() as $curso) {
            $this->mergeCells("A{$current_row}:J{$current_row}");
            $this->setCellValue( "A{$current_row}", $curso->nombre );
            $current_row ++;
            $trabajadores = $curso->trabajadores->where('id_capacitacion', $this->capacitacion->id);
            foreach ($trabajadores as $trabajador) {
                $this->setCellValue( "A{$current_row}", $counter++ );
                $this->setCellValue( "B{$current_row}", $trabajador->nombreCompleto() );
                $this->setCellValue( "C{$current_row}", $trabajador->numero_colaborador );
                $this->setCellValue( "D{$current_row}", $trabajador->departamento ? $trabajador->departamento->nombre : '' );
                $this->setCellValue( "E{$current_row}", $trabajador->puesto ? $trabajador->puesto->nombre : '' );
                $this->setCellValue( "F{$current_row}", $trabajador->aciertos ?: '' );
                $this->setCellValue( "G{$current_row}", $trabajador->preguntas ?: '' );
                $this->setCellValue( "H{$current_row}", $trabajador->calificacion() ?: '' );
                $this->setCellValue( "I{$current_row}", $trabajador->calificacion_estado() ?: '' );
                if( $trabajador->reprobado() && $trabajador->calificacion() ){
                    $this->setRedFont( "H{$current_row}" );
                    $this->setRedFont( "I{$current_row}" );
                }
                $this->setCellValue( "J{$current_row}", $trabajador->observaciones );
                $current_row ++;
            }
        }
        // $this->removeRow( $current_row, 1 );
    }
}