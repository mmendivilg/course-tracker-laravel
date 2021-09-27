<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\ClienteEmpresa\ClienteEmpresaController;
use App\Http\Controllers\Capacitacion\CursoController;
use App\Http\Controllers\Capacitacion\CapacitadorController;
use App\Http\Controllers\Capacitacion\CapacitacionController;
use App\Http\Controllers\Trabajador\TrabajadorController;
use App\Http\Controllers\Archivo\ArchivoController;
use App\Http\Controllers\Capacitacion\CapacitacionCursosController;
use App\Http\Controllers\Cat\DuracionController;
use App\Http\Controllers\Cat\TipoCapacitacionController;
use App\Http\Controllers\Capacitacion\CapacitacionGrupoController;
use App\Http\Controllers\Capacitacion\CapacitacionReporteController;
use App\Http\Controllers\Cat\SubAreaOcupacionController;
use App\Http\Controllers\Cat\DepartamentoController;
use App\Http\Controllers\Cat\PuestoController;
use App\Http\Controllers\ClienteEmpresa\ClienteEmpresaLogotipoController;
use App\Http\Controllers\Cat\EmpresaGiroController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::middleware('locale')->group(function () {
    Route::post('register', [LoginController::class, 'register']);
    Route::post('login', [LoginController::class, 'login']);

    Route::middleware('auth:sanctum')->group(function () {
        Route::get('/user', function (Request $request) {
            return $request->user();
        });
        Route::get('/users/{id}', [UserController::class, 'show']);
        Route::get('logout', [LoginController::class, 'logout']);
    });
    
    Route::middleware('auth:sanctum')->group(function () {
        Route::prefix('clientes_empresas')->group(function () {
            Route::get('/', [ClienteEmpresaController::class, 'index']);
            Route::get('/{id}', [ClienteEmpresaController::class, 'show']);
            Route::post('/', [ClienteEmpresaController::class, 'store']);
            Route::put('/{id}', [ClienteEmpresaController::class, 'update']);
            Route::delete('/{id}', [ClienteEmpresaController::class, 'destroy']);
        });
    });

    Route::middleware('auth:sanctum')->group(function () {
        Route::prefix('cliente_empresa/logotipo')->group(function () {
            Route::get('/{id}', [ClienteEmpresaLogotipoController::class, 'show']);
            Route::post('/{id}', [ClienteEmpresaLogotipoController::class, 'update']);
            Route::delete('/{id}', [ClienteEmpresaLogotipoController::class, 'destroy']);
        });
    });
    
    Route::middleware('auth:sanctum')->group(function () {
        Route::prefix('cat_cursos')->group(function () {
            Route::get('/', [CursoController::class, 'index']);
            Route::get('/{id}', [CursoController::class, 'show']);
            Route::post('/', [CursoController::class, 'store']);
            Route::put('/{id}', [CursoController::class, 'update']);
            Route::delete('/{id}', [CursoController::class, 'destroy']);
        });
    });

    Route::middleware('auth:sanctum')->group(function () {
        Route::prefix('capacitadores')->group(function () {
            Route::get('/', [CapacitadorController::class, 'index']);
            Route::get('/{id}', [CapacitadorController::class, 'show']);
            Route::post('/', [CapacitadorController::class, 'store']);
            Route::put('/{id}', [CapacitadorController::class, 'update']);
            Route::delete('/{id}', [CapacitadorController::class, 'destroy']);
        });
    });

    Route::middleware('auth:sanctum')->group(function () {
        Route::prefix('capacitaciones')->group(function () {
            Route::get('/', [CapacitacionController::class, 'index']);
            Route::get('/{id}', [CapacitacionController::class, 'show']);
            Route::post('/', [CapacitacionController::class, 'store']);
            Route::put('/{id}', [CapacitacionController::class, 'update']);
            Route::delete('/{id}', [CapacitacionController::class, 'destroy']);
        });
    });

    Route::middleware('auth:sanctum')->group(function () {
        Route::prefix('capacitacion/grupos')->group(function () {
            Route::post('/archivo/{id_capacitacion}', [CapacitacionGrupoController::class, 'store']);
            Route::get('/plantilla', [CapacitacionGrupoController::class, 'template']);
            Route::get('/{id}', [CapacitacionGrupoController::class, 'show']);
        });
    });

    Route::middleware('auth:sanctum')->group(function () {
        Route::prefix('capacitacion/export')->group(function () {
            Route::get('/reporte/{id}', [CapacitacionReporteController::class, 'reporte']);
            Route::get('/dc3/{id}', [CapacitacionReporteController::class, 'dc3']);
            Route::get('/certificado/{id}', [CapacitacionReporteController::class, 'certificado']);
        });
    });

    Route::middleware('auth:sanctum')->group(function () {
        Route::prefix('capacitacion/cursos')->group(function () {
            Route::get('/{id}', [CapacitacionCursosController::class, 'show']);
        });
    });

    Route::middleware('auth:sanctum')->group(function () {
        Route::prefix('trabajadores')->group(function () {
            Route::get('/', [TrabajadorController::class, 'index']);
            Route::get('/{id}', [TrabajadorController::class, 'show']);
            Route::post('/', [TrabajadorController::class, 'store']);
            Route::put('/{id}', [TrabajadorController::class, 'update']);
            Route::delete('/delete', [TrabajadorController::class, 'destroy']);
        });
    });

    Route::middleware('auth:sanctum')->group(function () {
        Route::prefix('archivos')->group(function () {
            Route::post('/', [ArchivoController::class, 'store']);
            Route::get('/{id}', [ArchivoController::class, 'show']);
        });
    });
    
    Route::middleware('auth:sanctum')->group(function () {
        Route::prefix('cat_tipos_capacitaciones')->group(function () {
            Route::get('/', [TipoCapacitacionController::class, 'index']);
            Route::get('/{id}', [TipoCapacitacionController::class, 'show']);
        });
    });

    Route::middleware('auth:sanctum')->group(function () {
        Route::prefix('cat_sub_areas_ocupaciones')->group(function () {
            Route::get('/', [SubAreaOcupacionController::class, 'index']);
            Route::get('/vselect-formatted', [SubAreaOcupacionController::class, 'vselect']);
            Route::get('/{id}', [SubAreaOcupacionController::class, 'show']);
        });
    });
    
    Route::middleware('auth:sanctum')->group(function () {
        Route::prefix('cat_duraciones')->group(function () {
            Route::get('/', [DuracionController::class, 'index']);
            Route::get('/{id}', [DuracionController::class, 'show']);
            Route::post('/', [DuracionController::class, 'store']);
            Route::put('/{id}', [DuracionController::class, 'update']);
            Route::delete('/{id}', [DuracionController::class, 'destroy']);
        });
    });
        
    Route::middleware('auth:sanctum')->group(function () {
        Route::prefix('cat_departamentos')->group(function () {
            Route::get('/', [DepartamentoController::class, 'index']);
            Route::get('/{id}', [DepartamentoController::class, 'show']);
        });
    });

    Route::middleware('auth:sanctum')->group(function () {
        Route::prefix('cat_empresas_giros')->group(function () {
            Route::get('/', [EmpresaGiroController::class, 'index']);
            Route::get('/{id}', [EmpresaGiroController::class, 'show']);
        });
    });
    

    Route::middleware('auth:sanctum')->group(function () {
        Route::prefix('cat_puestos')->group(function () {
            Route::get('/', [PuestoController::class, 'index']);
            Route::get('/{id}', [PuestoController::class, 'show']);
        });
    });
});