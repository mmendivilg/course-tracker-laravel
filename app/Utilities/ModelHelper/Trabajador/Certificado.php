<?php

namespace App\Utilities\ModelHelper\Trabajador;
use App\Models\Capacitacion\Capacitacion;
use Illuminate\Support\Facades\Config;
use App\Models\Archivo\Archivo;
use App\Models\Empresa\Empresa;
use App\Utilities\FechaFormato;

trait Certificado
{
    public function certData(){
        $data = [];

        //***DATOS DEL TRABAJADOR
        //Nombre																											
        $data['trabajador']['nombre'] = mb_strtoupper( $this->nombreCompleto() );


        // DATOS DE LA EMPRESA
        $cliente_empresa = $this->capacitacion->clienteEmpresa;
        //Nombre o razón social																												
        $data['empresa']['nombre'] = $cliente_empresa ? $cliente_empresa->nombre : '';

        //Calle
        $calle = $cliente_empresa ? $cliente_empresa->calle : '';
        $calle = $calle ? "Calle {$calle}" : "";
        $numero = $cliente_empresa ? $cliente_empresa->numero : "";
        $data['empresa']['calle'] = implode( " ", array_filter([ $calle, $numero ]));

        //C.P
        $data['empresa']['codigo_postal'] = $cliente_empresa ? $cliente_empresa->codigo_postal : '';

        //Ciudad
        $data['empresa']['ciudad'] = $cliente_empresa ? $cliente_empresa->ciudad : '';

        //Estado
        $data['empresa']['estado'] = $cliente_empresa ? $cliente_empresa->estado : '';

        //Pais
        $data['empresa']['pais'] = $cliente_empresa ? $cliente_empresa->pais : '';

        //DATOS PROGRAMA DE CAPACITACION
        $curso = $this->curso;

        //Nombre 																											
        $data['curso']['nombre'] = $curso ? $curso->nombre : '';

        //Fecha del curso

        //Duracion en horas 
        $cursos_datos = $this->capacitacion->cursosCapacitadores();
        $curso_datos = $cursos_datos->getCurso( $curso->id );
        $duracion = $curso_datos->duracion;
        $fecha = $curso_datos->fecha ? new FechaFormato( $curso_datos->fecha, 'Y-m-d' ) : null;
        $data['curso']['duracion'] = $duracion ? $duracion->horasRounded() : '';
        $data['curso']['fecha_completa'] = $fecha ? $fecha->fechaCompleta() : '';

        // FIN DATOS DE LA EMPRESA

        //Nombre agente																								
        $capacitador = $curso_datos->capacitador;
        $data['capacitador']['nombre_agente'] = '';
        $data['capacitador']['registro_stps'] = '';
        $data['capacitador']['firma'] = '';
        if( $capacitador ){
            $registro_stps = $capacitador->registro_stps;
            $nombre_completo = mb_strtoupper( $capacitador->nombreCompleto( false ) );
            $data['capacitador']['registro_stps'] = $registro_stps ? "Registro STPS: {$registro_stps}" : "";
            $data['capacitador']['nombre_agente'] = "Lic. {$nombre_completo}";
            $data['capacitador']['firma'] = $capacitador->firma ? $capacitador->firma->path() : '';
        }

        //FIN DATOS PROGRAMA DE CAPACITACION
        return $data;
    }
}