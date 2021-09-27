<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ocupacion\SubAreaOcupacion;
use App\Models\Ocupacion\AreaOcupacion;

class CatAreasSubareasOcupacionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SubAreaOcupacion::query()->truncate();
        AreaOcupacion::query()->truncate();
        AreaOcupacion::create(
            [
                'id_empresa' => 1,
                'codigo_area' => '1',
                'nombre' => 'Cultivo, crianza y aprovechamiento',
            ]
        );
        AreaOcupacion::create(
            [
                'id_empresa' => 1,
                'codigo_area' => '2',
                'nombre' => 'Extracción y suministro',
            ]
        );
        AreaOcupacion::create(
            [
                'id_empresa' => 1,
                'codigo_area' => '3',
                'nombre' => 'Construcción',
            ]
        );
        AreaOcupacion::create(
            [
                'id_empresa' => 1,
                'codigo_area' => '4',
                'nombre' => 'Tecnología',
            ]
        );
        AreaOcupacion::create(
            [
                'id_empresa' => 1,
                'codigo_area' => '5',
                'nombre' => 'Procesamiento y fabricación',
            ]
        );
        AreaOcupacion::create(
            [
                'id_empresa' => 1,
                'codigo_area' => '6',
                'nombre' => 'Transporte',
            ]
        );
        AreaOcupacion::create(
            [
                'id_empresa' => 1,
                'codigo_area' => '7',
                'nombre' => 'Provisión de bienes y servicios',
            ]
        );
        AreaOcupacion::create(
            [
                'id_empresa' => 1,
                'codigo_area' => '8',
                'nombre' => 'Gestión y soporte administrativo',
            ]
        );
        AreaOcupacion::create(
            [
                'id_empresa' => 1,
                'codigo_area' => '9',
                'nombre' => 'Salud y protección social',
            ]
        );
        AreaOcupacion::create(
            [
                'id_empresa' => 1,
                'codigo_area' => '10',
                'nombre' => 'Comunicación',
            ]
        );
        AreaOcupacion::create(
            [
                'id_empresa' => 1,
                'codigo_area' => '11',
                'nombre' => 'Desarrollo y extensión del conocimiento',
            ]
        );
        SubAreaOcupacion::create(
            [
                'id_empresa' => 1,
                'id_cat_area_ocupacion' => 1,
                'codigo_sub_area' => '1.1',
                'nombre' => 'Agricultura y silvicultura'
            ]
        );
        
        SubAreaOcupacion::create(
            [
                'id_empresa' => 1,
                'id_cat_area_ocupacion' => 1,
                'codigo_sub_area' => '1.2',
                'nombre' => 'Ganadería'
            ]
        );
        
        SubAreaOcupacion::create(
            [
                'id_empresa' => 1,
                'id_cat_area_ocupacion' => 1,
                'codigo_sub_area' => '1.3',
                'nombre' => 'Pesca y acuacultura'
            ]
        );
        
        SubAreaOcupacion::create(
            [
                'id_empresa' => 1,
                'id_cat_area_ocupacion' => 2,
                'codigo_sub_area' => '2.1',
                'nombre' => 'Exploración'
            ]
        );
        
        SubAreaOcupacion::create(
            [
                'id_empresa' => 1,
                'id_cat_area_ocupacion' => 2,
                'codigo_sub_area' => '2.2',
                'nombre' => 'Extracción'
            ]
        );
        
        SubAreaOcupacion::create(
            [
                'id_empresa' => 1,
                'id_cat_area_ocupacion' => 2,
                'codigo_sub_area' => '2.3',
                'nombre' => 'Refinación y beneficio'
            ]
        );
        
        SubAreaOcupacion::create(
            [
                'id_empresa' => 1,
                'id_cat_area_ocupacion' => 2,
                'codigo_sub_area' => '2.4',
                'nombre' => 'Provisión de energía'
            ]
        );
        
        SubAreaOcupacion::create(
            [
                'id_empresa' => 1,
                'id_cat_area_ocupacion' => 2,
                'codigo_sub_area' => '2.5',
                'nombre' => 'Provisión de agua'
            ]
        );
        
        SubAreaOcupacion::create(
            [
                'id_empresa' => 1,
                'id_cat_area_ocupacion' => 3,
                'codigo_sub_area' => '3.1',
                'nombre' => 'Planeación y dirección de obras'
            ]
        );
        
        SubAreaOcupacion::create(
            [
                'id_empresa' => 1,
                'id_cat_area_ocupacion' => 3,
                'codigo_sub_area' => '3.2',
                'nombre' => 'Edificación y urbanización'
            ]
        );
        
        SubAreaOcupacion::create(
            [
                'id_empresa' => 1,
                'id_cat_area_ocupacion' => 3,
                'codigo_sub_area' => '3.3',
                'nombre' => 'Acabado'
            ]
        );
        
        SubAreaOcupacion::create(
            [
                'id_empresa' => 1,
                'id_cat_area_ocupacion' => 3,
                'codigo_sub_area' => '3.4',
                'nombre' => 'Instalación y mantenimiento'
            ]
        );
        
        SubAreaOcupacion::create(
            [
                'id_empresa' => 1,
                'id_cat_area_ocupacion' => 4,
                'codigo_sub_area' => '4.1',
                'nombre' => 'Mecánica'
            ]
        );
        
        SubAreaOcupacion::create(
            [
                'id_empresa' => 1,
                'id_cat_area_ocupacion' => 4,
                'codigo_sub_area' => '4.2',
                'nombre' => 'Electricidad'
            ]
        );
        
        SubAreaOcupacion::create(
            [
                'id_empresa' => 1,
                'id_cat_area_ocupacion' => 4,
                'codigo_sub_area' => '4.3',
                'nombre' => 'Electrónica'
            ]
        );
        
        SubAreaOcupacion::create(
            [
                'id_empresa' => 1,
                'id_cat_area_ocupacion' => 4,
                'codigo_sub_area' => '4.4',
                'nombre' => 'Informática'
            ]
        );
        
        SubAreaOcupacion::create(
            [
                'id_empresa' => 1,
                'id_cat_area_ocupacion' => 4,
                'codigo_sub_area' => '4.5',
                'nombre' => 'Telecomunicaciones'
            ]
        );
        
        SubAreaOcupacion::create(
            [
                'id_empresa' => 1,
                'id_cat_area_ocupacion' => 4,
                'codigo_sub_area' => '4.6',
                'nombre' => 'Procesos industriales'
            ]
        );
        
        SubAreaOcupacion::create(
            [
                'id_empresa' => 1,
                'id_cat_area_ocupacion' => 5,
                'codigo_sub_area' => '5.1',
                'nombre' => 'Minerales no metálicos'
            ]
        );
        
        SubAreaOcupacion::create(
            [
                'id_empresa' => 1,
                'id_cat_area_ocupacion' => 5,
                'codigo_sub_area' => '5.2',
                'nombre' => 'Metales'
            ]
        );
        
        SubAreaOcupacion::create(
            [
                'id_empresa' => 1,
                'id_cat_area_ocupacion' => 5,
                'codigo_sub_area' => '5.3',
                'nombre' => 'Alimentos y bebidas'
            ]
        );
        
        SubAreaOcupacion::create(
            [
                'id_empresa' => 1,
                'id_cat_area_ocupacion' => 5,
                'codigo_sub_area' => '5.4',
                'nombre' => 'Textiles y prendas de vestir'
            ]
        );
        
        SubAreaOcupacion::create(
            [
                'id_empresa' => 1,
                'id_cat_area_ocupacion' => 5,
                'codigo_sub_area' => '5.5',
                'nombre' => 'Materia orgánica'
            ]
        );
        
        SubAreaOcupacion::create(
            [
                'id_empresa' => 1,
                'id_cat_area_ocupacion' => 5,
                'codigo_sub_area' => '5.6',
                'nombre' => 'Productos químicos'
            ]
        );
        
        SubAreaOcupacion::create(
            [
                'id_empresa' => 1,
                'id_cat_area_ocupacion' => 5,
                'codigo_sub_area' => '5.7',
                'nombre' => 'Productos metálicos y de hule y plástico'
            ]
        );
        
        SubAreaOcupacion::create(
            [
                'id_empresa' => 1,
                'id_cat_area_ocupacion' => 5,
                'codigo_sub_area' => '5.8',
                'nombre' => 'Productos eléctricos y electrónicos'
            ]
        );
        
        SubAreaOcupacion::create(
            [
                'id_empresa' => 1,
                'id_cat_area_ocupacion' => 5,
                'codigo_sub_area' => '5.9',
                'nombre' => 'Productos impresos'
            ]
        );
        
        SubAreaOcupacion::create(
            [
                'id_empresa' => 1,
                'id_cat_area_ocupacion' => 6,
                'codigo_sub_area' => '6.1',
                'nombre' => 'Ferroviario'
            ]
        );
        
        SubAreaOcupacion::create(
            [
                'id_empresa' => 1,
                'id_cat_area_ocupacion' => 6,
                'codigo_sub_area' => '6.2',
                'nombre' => 'Autotransporte'
            ]
        );
        
        SubAreaOcupacion::create(
            [
                'id_empresa' => 1,
                'id_cat_area_ocupacion' => 6,
                'codigo_sub_area' => '6.3',
                'nombre' => 'Aéreo'
            ]
        );
        
        SubAreaOcupacion::create(
            [
                'id_empresa' => 1,
                'id_cat_area_ocupacion' => 6,
                'codigo_sub_area' => '6.4',
                'nombre' => 'Marítimo y fluvial'
            ]
        );
        
        SubAreaOcupacion::create(
            [
                'id_empresa' => 1,
                'id_cat_area_ocupacion' => 6,
                'codigo_sub_area' => '6.5',
                'nombre' => 'Servicios de apoyo'
            ]
        );
        
        SubAreaOcupacion::create(
            [
                'id_empresa' => 1,
                'id_cat_area_ocupacion' => 7,
                'codigo_sub_area' => '7.1',
                'nombre' => 'Comercio'
            ]
        );
        
        SubAreaOcupacion::create(
            [
                'id_empresa' => 1,
                'id_cat_area_ocupacion' => 7,
                'codigo_sub_area' => '7.2',
                'nombre' => 'Alimentación y hospedaje'
            ]
        );
        
        SubAreaOcupacion::create(
            [
                'id_empresa' => 1,
                'id_cat_area_ocupacion' => 7,
                'codigo_sub_area' => '7.3',
                'nombre' => 'Turismo'
            ]
        );
        
        SubAreaOcupacion::create(
            [
                'id_empresa' => 1,
                'id_cat_area_ocupacion' => 7,
                'codigo_sub_area' => '7.4',
                'nombre' => 'Deporte y esparcimiento'
            ]
        );
        
        SubAreaOcupacion::create(
            [
                'id_empresa' => 1,
                'id_cat_area_ocupacion' => 7,
                'codigo_sub_area' => '7.5',
                'nombre' => 'Servicios personales'
            ]
        );
        
        SubAreaOcupacion::create(
            [
                'id_empresa' => 1,
                'id_cat_area_ocupacion' => 7,
                'codigo_sub_area' => '7.6',
                'nombre' => 'Reparación de artículos de uso doméstico y personal'
            ]
        );
        
        SubAreaOcupacion::create(
            [
                'id_empresa' => 1,
                'id_cat_area_ocupacion' => 7,
                'codigo_sub_area' => '7.7',
                'nombre' => 'Limpieza'
            ]
        );
        
        SubAreaOcupacion::create(
            [
                'id_empresa' => 1,
                'id_cat_area_ocupacion' => 7,
                'codigo_sub_area' => '7.8',
                'nombre' => 'Servicio postal y mensajería'
            ]
        );
        
        SubAreaOcupacion::create(
            [
                'id_empresa' => 1,
                'id_cat_area_ocupacion' => 8,
                'codigo_sub_area' => '8.1',
                'nombre' => 'Bolsa, banca y seguros'
            ]
        );
        
        SubAreaOcupacion::create(
            [
                'id_empresa' => 1,
                'id_cat_area_ocupacion' => 8,
                'codigo_sub_area' => '8.2',
                'nombre' => 'Administración'
            ]
        );
        
        SubAreaOcupacion::create(
            [
                'id_empresa' => 1,
                'id_cat_area_ocupacion' => 8,
                'codigo_sub_area' => '8.3',
                'nombre' => 'Servicios legales'
            ]
        );
        
        SubAreaOcupacion::create(
            [
                'id_empresa' => 1,
                'id_cat_area_ocupacion' => 9,
                'codigo_sub_area' => '9.1',
                'nombre' => 'Servicios médicos'
            ]
        );
        
        SubAreaOcupacion::create(
            [
                'id_empresa' => 1,
                'id_cat_area_ocupacion' => 9,
                'codigo_sub_area' => '9.2',
                'nombre' => 'Inspección sanitaria y del medio ambiente'
            ]
        );
        
        SubAreaOcupacion::create(
            [
                'id_empresa' => 1,
                'id_cat_area_ocupacion' => 9,
                'codigo_sub_area' => '9.3',
                'nombre' => 'Seguridad social'
            ]
        );
        
        SubAreaOcupacion::create(
            [
                'id_empresa' => 1,
                'id_cat_area_ocupacion' => 9,
                'codigo_sub_area' => '9.4',
                'nombre' => 'Protección de bienes y/o personas'
            ]
        );
        
        SubAreaOcupacion::create(
            [
                'id_empresa' => 1,
                'id_cat_area_ocupacion' => 10,
                'codigo_sub_area' => '10.1',
                'nombre' => 'Publicación'
            ]
        );
        
        SubAreaOcupacion::create(
            [
                'id_empresa' => 1,
                'id_cat_area_ocupacion' => 10,
                'codigo_sub_area' => '10.2',
                'nombre' => 'Radio, cine, televisión y teatro'
            ]
        );
        
        SubAreaOcupacion::create(
            [
                'id_empresa' => 1,
                'id_cat_area_ocupacion' => 10,
                'codigo_sub_area' => '10.3',
                'nombre' => 'Interpretación artística'
            ]
        );
        
        SubAreaOcupacion::create(
            [
                'id_empresa' => 1,
                'id_cat_area_ocupacion' => 10,
                'codigo_sub_area' => '10.4',
                'nombre' => 'Traducción e interpretación lingüística'
            ]
        );
        
        SubAreaOcupacion::create(
            [
                'id_empresa' => 1,
                'id_cat_area_ocupacion' => 10,
                'codigo_sub_area' => '10.5',
                'nombre' => 'Publicidad, propaganda y relaciones públicas'
            ]
        );
        
        SubAreaOcupacion::create(
            [
                'id_empresa' => 1,
                'id_cat_area_ocupacion' => 11,
                'codigo_sub_area' => '11.1',
                'nombre' => 'Investigación'
            ]
        );
        
        SubAreaOcupacion::create(
            [
                'id_empresa' => 1,
                'id_cat_area_ocupacion' => 11,
                'codigo_sub_area' => '11.2',
                'nombre' => 'Enseñanza'
            ]
        );
        
        SubAreaOcupacion::create(
            [
                'id_empresa' => 1,
                'id_cat_area_ocupacion' => 11,
                'codigo_sub_area' => '11.3',
                'nombre' => 'Difusión cultural'
            ]
        );
    }
}
