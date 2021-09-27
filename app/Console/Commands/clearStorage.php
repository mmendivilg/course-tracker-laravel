<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class clearStorage extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'clear:storage';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Empty folders used for user uploads';

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
        $this->line('>Call clear:storage');
        $dirs = [
            'archivos',
            'logotipos',
            'reportes',
            'imagenes',
            'tmp',
        ];
        foreach ($dirs as $directory) {
            $success = Storage::deleteDirectory($directory) || !Storage::exists($directory);
            if($success) {
                $this->info('Directory: app/'.$directory.' cleared.');
            } else {
                $this->error('Error trying to empty directory: app/'.$directory);
            }
        }
        return 0;
    }
}
