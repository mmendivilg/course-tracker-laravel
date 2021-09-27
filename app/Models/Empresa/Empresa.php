<?php


namespace App\Models\Empresa;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Utilities\Helper\Logotipo;

class Empresa extends Model
{
    use SoftDeletes, Logotipo, HasFactory;

    protected $table = "empresas";

    protected static function newFactory()
    {
        return \Database\Factories\EmpresaFactory::new();
    }
}
