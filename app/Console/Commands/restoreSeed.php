<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\File;
use App\Utilities\Container;

class restoreSeed extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'restore:seed';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Wipe database, migrate, seed, and empty storage user folders.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->line('>Call db:wipe');
        $this->call('db:wipe');
        $this->line('>Call migrate');
        $this->call('migrate');
        $this->line('>Call db:seed');
        $this->call('db:seed');
        $this->call('clear:storage');
        $this->line('>Call optimize');
        $this->call('optimize');
        $archivos_copiar = [
            '_a' => Config::get('constants.plantilla.capacitacion.certificado.imagenes._a'),
            '_b' => Config::get('constants.plantilla.capacitacion.certificado.imagenes._b')
        ];
        Container::folder( 'app/imagenes' );
        foreach ($archivos_copiar as $nombre => $archivo) {
            File::copy( $archivo, storage_path( "app/imagenes/{$nombre}.png" ) );
        }
        return 0;
    }
}
