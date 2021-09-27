<?php

namespace App\Utilities;

use Exception;
use Illuminate\Support\Facades\File;

/**
 * Verifica que exista la carpeta,
 * donde se va a crear el archivo
 * @package App\Utilities
 */
trait Container
{
    /**
     * Verificar que exista la carpeta,
     * cuando no existe se crea
     * @param mixed $container 
     * @param mixed $file 
     * @return string 
     * @throws Exception 
     */
    static function container( $container, $file ){
        self::folder($container);
        return storage_path( "{$container}{$file}" );
    }

    static function folder( $container ){
        $path = storage_path( $container );

        if(!File::exists( $path ) ){
            File::makeDirectory($path, 0755, true);
        }
        return $path;
    }
}