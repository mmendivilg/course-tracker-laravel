<?php

namespace App\Utilities\ModelHelper\Trabajador;
use App\Models\Capacitacion\Capacitacion;
use Illuminate\Support\Facades\Config;
use App\Models\Archivo\Archivo;
use App\Models\Empresa\Empresa;

trait DC3
{
    public function dc3Data(){
        $data = [];
        
        //***DATOS DEL TRABAJADOR
        //Nombre																											
        $data['trabajador']['nombre'] = $this->nombreCompleto();
    
        //RFC
        $rfc_s = preg_replace("/[^a-zA-Z\d]/", "", $this->rfc);
        $rfc_a = str_split($rfc_s);
        $data['trabajador']['rfc'] = [];
        for ($i=0; $i < 13; $i++) { 
            $letra = array_shift($rfc_a);
            $data['trabajador']['rfc'][] = $letra;
        }

        //FIN RFC

        //Puesto												
        $data['trabajador']['puesto'] = $this->puesto ? $this->puesto->nombre : '';
        // FIN DATOS DEL TRABAJADOR

        // DATOS DE LA EMPRESA
        $cliente_empresa = $this->capacitacion->clienteEmpresa;
        //Nombre o razón social																												
        $data['empresa']['nombre'] = $cliente_empresa ? $cliente_empresa->nombre : '';

        //RFC
        $rfc_s = preg_replace("/[^a-zA-Z\d]/", "", $cliente_empresa ? $cliente_empresa->rfc : '');
        $rfc_a = str_split($rfc_s ?: '');
        $data['empresa']['rfc'] = [];
        for ($i=0; $i < 13; $i++) { 
            $letra = array_shift($rfc_a);
            $data['empresa']['rfc'][] = $letra;
        }
        //FIN RFC

        //REGISTRO IMSS
        $reg_imss_s = preg_replace("/[^a-zA-Z\d]/", "", $cliente_empresa ? $cliente_empresa->registro_imss : '');
        $reg_imss_a = str_split($reg_imss_s ?: '');
        $data['empresa']['imss'] = [];
        for ($i=0; $i < 11; $i++) { 
            $letra = array_shift($reg_imss_a);
            $data['empresa']['imss'][] = $letra;
        }
        
        //FIN REGISTRO IMSS

        //Actividad o giro principal 																											
        $data['empresa']['giro'] = $cliente_empresa ? $cliente_empresa->empresaGiro->nombre : '';

        // FIN DATOS DE LA EMPRESA

        //DATOS PROGRAMA DE CAPACITACION
        $curso = $this->curso;

        //Nombre 																											
        $data['curso']['nombre'] = $curso ? $curso->nombre : '';
        
        //Duracion en horas 
        /**  */
        $cursos_fechas = $this->capacitacion->cursosFechas();
        $curso_fecha = $cursos_fechas->getCurso( $curso->id );
        $duracion = $curso_fecha ? $curso_fecha->duracion : null;
        $data['curso']['duracion'] = $duracion ? $duracion->horasRounded() : '';
        //PERIODO DE EJECUCION
        $fechas = $curso_fecha ? $curso_fecha->fechasOrdenadas() : [];
        $data['curso']['fechas']['a'] = $fechas ? $this->leerFecha( array_shift($fechas) ) : [];
        $data['curso']['fechas']['b'] = $fechas ? $this->leerFecha( array_shift($fechas) ) : [];

        // FIN PERIODO DE EJECUCION

        //Nombre agente																								
        $capacitadores = $curso_fecha ? $curso_fecha->capacitadores() : [];
        $data['capacitadores']['nombres_agentes'] = '';
        if( count($capacitadores) ){
            $capacitadores_texto = $capacitadores->map( function( $capacitador, $key ) {
                $nombre_completo = mb_strtoupper( $capacitador->nombreCompleto( false ) );
                $registro_stps = $capacitador->registro_stps;
                $registro_stps = $registro_stps ? "Registro STPS:{$registro_stps}" : "";
                return implode( " ", [ $nombre_completo, $registro_stps ] );
            })->join(' / ');
            $data['capacitadores']['nombres_agentes'] = $capacitadores_texto;
        }

        //Nombre y firma instructor																											
        $data['capacitadores']['nombres'] = '';
        if( count($capacitadores) ){
            $capacitadores_texto = $capacitadores->map( function( $capacitador, $key ) {
                return mb_strtoupper( $capacitador->nombreCompleto( false ) );
            })->join(' / ');
            $data['capacitadores']['nombres'] = $capacitadores_texto;
        }

        //FIN DATOS PROGRAMA DE CAPACITACION
        return $data;
    }

    public function leerFecha( $fecha ){
        if( !$fecha ) return;
        //YEAR
        $fecha = \DateTime::createFromFormat( "Y-m-d", $fecha );
        $year = $fecha->format( "y" );
        $year_a = str_split( strval( $year ) );
        $data = [];
        $data[] = array_shift( $year_a );
        $data[] = array_shift( $year_a );

        //MONTH
        $month = $fecha->format("m");
        $month_a = str_split( strval( $month ) );
        $data[] = array_shift( $month_a );
        $data[] = array_shift( $month_a );
        
        //DAY
        $day = $fecha->format("d");
        $day_a = str_split( strval( $day ) );
        $data[] = array_shift( $day_a );
        $data[] = array_shift( $day_a );

        return $data;
    }
}