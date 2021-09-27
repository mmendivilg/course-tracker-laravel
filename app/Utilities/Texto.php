<?php

namespace App\Utilities;
use Illuminate\Support\Str;

/**
 * Funciones en general para operar con strings
 * Exiende a Illuminate\Support\Str
 * @package App\Utilities
 */
class Texto extends Str
{

    static public function isEmptyString($data)
    {
        return (trim($data) === "" or $data === null);
    }
}