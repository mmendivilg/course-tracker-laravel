<?php
namespace App\Utilities\Import;

use App\Utilities\Texto;

class Import
{
    protected function rowHasData($row){
        $hasData = false;
        foreach ( $row as $value ) {
            if( !Texto::isEmptyString( $value ) )
            $hasData = true;
        }
        return $hasData;
    }
}