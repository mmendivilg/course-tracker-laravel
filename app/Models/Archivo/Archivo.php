<?php
namespace App\Models\Archivo;

use App\Utilities\ModelHelper\Archivo\ArchivoRevelar;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Archivo extends Model
{
    use SoftDeletes, ArchivoRevelar;
    public $timestamps = true;
    protected $table = "archivos";

    public function contents(){
        return file_get_contents( $this->path() );
    }

    public function path(){
        return storage_path( 'app/'.$this->path );
    }
}