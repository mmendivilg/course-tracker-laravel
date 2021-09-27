<?php

namespace App\Utilities\Import;

use App\Models\Empresa\Empresa;
use App\Models\Tag\CursoTag;
use App\Utilities\Excel\ExcelReader;
use App\Models\Trabajador\Trabajador;
use App\Models\Tag\DepartamentoTag;
use App\Models\Trabajador\Departamento;
use App\Models\Tag\SubAreaOcupacionTag;
use App\Models\Tag\PuestoTag;
use App\Models\Trabajador\Puesto;

class TrabajadorImport extends Import
{
    private $data;
    public function __construct ( $path, $highestColumnIndex = null ) {
        $columns = $this->getColumns();
        $highestColumnIndex = $highestColumnIndex ?: count( $columns );
        $reader = new ExcelReader( $path, $highestColumnIndex );
        $this->data = $reader->data;
    }

    public function getColumns(){
        return [
            'nombre',
            'numero_colaborador',
            'rfc',
            'curso',
            'departamento',
            'puesto',
            'sub_area',
            'aciertos',
            'preguntas',
            'observaciones',
        ];
    }

    public function import( $id_capacitacion ){
        $dataFound = $this->data['data'];
        
        if( count($dataFound) && $dataFound["1"]['1'] == 'nombre' ){
            unset($dataFound["1"]); //remove first element (xls headers row)
        } else {
            throw new \Error( __('messages.invalid-file') );
        }

        $cursoTag = new CursoTag(Empresa::find(1));
        $departamentoTag = new DepartamentoTag(Empresa::find(1));
        $subareaTag = new SubAreaOcupacionTag(Empresa::find(1));
        $puestoTag = new PuestoTag(Empresa::find(1));
        $result = 0;
        foreach ($dataFound as $row) {
            if( !$this->rowHasData($row) ){
                continue;
            }
            
            $t = new Trabajador;
            $t->id_empresa = 1;
            $t->id_capacitacion = $id_capacitacion;
            $t->nombres = $row['1'];
            $t->numero_colaborador = $row['2'];
            $t->rfc = $row['3'];
            $t->id_cat_curso = $cursoTag->create( $row['4'] );
            $t->id_cat_departamento = $departamentoTag->create( $row['5'] );
            $t->id_cat_puesto = $puestoTag->create( $row['6'] );
            $t->id_cat_sub_area_ocupacion = $subareaTag->create( $row['7'] );
            $t->aciertos = $row['8'];
            $t->preguntas = $row['9'];
            $t->observaciones = $row['10'];
            if($t->save()){
                $result++;
            }
        }
        return $result;
    }
}
