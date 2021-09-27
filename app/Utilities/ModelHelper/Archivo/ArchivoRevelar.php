<?php

namespace App\Utilities\ModelHelper\Archivo;

use App\Models\Archivo\Archivo;
use Exception;
use Illuminate\Support\Facades\Storage;

trait ArchivoRevelar
{
    /**
     * copiar el archivo a carpeta temporal y mostrar la ruta
     * @return string 
     */
    public function revelar()
    {
        $time = time();
        $path = "test/{$time}{$this->nombre}";
        Storage::put( $path, $this->contents() );
        return $path;
    }
}