<?php

namespace App\Http\Controllers\Capacitacion;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\DC3Notification;
use App\Models\Capacitacion\Capacitacion;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Mail;
use Mailjet\LaravelMailjet\Facades\Mailjet;
use Mailjet\Resources;

class CapacitacionReporteController extends Controller
{
    public function reporte(Request $request, $id)
    {
        try {
            $capacitacion = Capacitacion::find($id);
            if(!$capacitacion){
               throw new \Error(__('messages.model-not-found-error'));
            }
            $archivo = $capacitacion->reporte();

            $file = file_get_contents( storage_path('app/'.$archivo->path) );
            return (new Response($file, 200))
            ->header('Content-Type', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            // return $archivo->revelar();
        } catch (\Exception | \Throwable | \Error $e) {
            return response()->json(["error" => $e->getMessage()], 500);
        }
    }

    public function dc3(Request $request, $id)
    {
        try {
            $capacitacion = Capacitacion::find($id);
            if(!$capacitacion){
               throw new \Error(__('messages.model-not-found-error'));
            }

            $archivo = $capacitacion->dc3('pdf');

            // Mail::to( 'mmendivilg@gmail.com' )->send( new DC3Notification( $archivo ) );

            $file = file_get_contents( storage_path('app/'.$archivo->path) );
            return (new Response($file, 200))
            ->header('Content-Type', 'application/zip');

            // return $archivo->revelar();
        } catch (\Exception | \Throwable | \Error $e) {
            return response()->json(["error" => $e->getMessage()], 500);
        }
    }

    public function certificado(Request $request, $id)
    {
        try {
            $capacitacion = Capacitacion::find($id);
            if(!$capacitacion){
               throw new \Error(__('messages.model-not-found-error'));
            }
            $archivo = $capacitacion->certificado();

            $file = file_get_contents( storage_path('app/'.$archivo->path) );
            return (new Response($file, 200))
            ->header('Content-Type', 'application/zip');

            // return $archivo->revelar();
        } catch (\Exception | \Throwable | \Error $e) {
            return response()->json(["error" => $e->getMessage()], 500);
        }
    }
}